<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Pokemon;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function checkConfiguration($name) 
    {
        $configuration = Configuration::where('name','like', '%'.strtoupper($name).'%')->get();
        if (count($configuration) > 0) {
            return $configuration[0];
        }else {
            return $this->createConfiguration($name);
        }
    }

    private function createConfiguration($identity)
    {
        $limit = (int)env('LIMIT_DATA');
        $url = env(strtoupper($identity).'_URL');
        $name = strtoupper($identity).'_CONFIGURATION';
        Configuration::create(['name'=>$name, 'detail_config'=> [ 'url'=>$url, 'last_page' => 0, 'limit' => $limit ]]);
        return $this->checkConfiguration($identity);
    }

    public function requestNewData($url, $lastPage, $limit, $codeName)
    {
        $client = new Client();
        $res = $client->request('GET', $url.'?offset='.($lastPage)* $limit.'&limit='.$limit);
        $body = json_decode($res->getBody());
        Configuration::where('name',$codeName)->update([
            'detail_config'=> [
                'url'=>$url,
                'limit'=> $limit,
                'last_page' => $body->count > $lastPage*$limit ? $lastPage+1 : $lastPage,
            ]
            ]);
        $result = $this->requestDetailData($body);
        return $result;
    }

    private function requestDetailData($data) 
    {
        $client = new Client();
        $result = [];
        foreach($data->results as $pokemon) {
            $res = $client->request('GET', $pokemon->url);
            array_push($result, json_decode($res->getBody()));
        }
        return $result;

    }
}
