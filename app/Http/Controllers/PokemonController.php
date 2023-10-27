<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index(Request $request)
    {
       try {
         // echo json_encode($request->query());
        $pokemons = Pokemon::get(['id', 'name', 'abilities']);
        return $pokemons;
       } catch (\Throwable $th) {
        throw $th;
       }
    }

    public function detail($id) 
    {
      try {
         $pokemon = Pokemon::where('id', (int) $id)->get();
         return $pokemon;
      } catch (\Throwable $th) {
         throw $th;
      }
    }
    public function loadNewData() 
    {
       try {
        $config = $this->checkConfiguration('pokemon');
       
        $detailConfig = json_decode(json_encode($config->detail_config));
        $newData = $this->requestNewData($detailConfig->url, $detailConfig->last_page, $detailConfig->limit, $config->name);
        foreach($newData as $newPokemon) 
        {
         Pokemon::create((array)$newPokemon);
        }
        return true;
       } catch (\Throwable $th) {
        throw $th;
       }
    }

}
