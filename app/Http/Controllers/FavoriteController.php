<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        try {
            $favorites = Favorite::all();
            return $favorites;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request) 
    {
        try {
            $body = [
                'id'=> $request->id,
                'name' => $request->name,
                'abilities' => $request->abilities
            ];
            Favorite::create($body);
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
