<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use App\Models\Favorite;
use Illuminate\Http\Request;

class AbilityController extends Controller
{
    public function index()
    {
       try {
        $abilities = Ability::all(['id','name']);
        return $abilities;
       } catch (\Throwable $th) {
        throw $th;
       }
    }
    public function loadNewData() 
    {
       try {
        $config = $this->checkConfiguration('ability');
       
        $detailConfig = json_decode(json_encode($config->detail_config));
        $newData = $this->requestNewData($detailConfig->url, $detailConfig->last_page, $detailConfig->limit, $config->name);
        foreach($newData as $newPokemon) 
        {
         Ability::create((array)$newPokemon);
        }
        return true;
       } catch (\Throwable $th) {
        throw $th;
       }
    }
    public function listFavorite()
    {
        $favorites = Favorite::all(['abilities']);
        $list = [];
        foreach ($favorites as $key ) {
            foreach ($key->abilities as $key2){
                $encodeKey = json_decode(json_encode($key2));
                $ability = json_decode(json_encode($encodeKey->ability));
                array_push($list, $ability->name);
            }
        }
        return $list;
    }
}
