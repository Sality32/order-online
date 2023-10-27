<?php

use App\Http\Controllers\AbilityController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PokemonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return 'Test';
});

Route::prefix('abilities')->group(function(){
    Route::get('index', [AbilityController::class, 'index']);
    Route::get('loadNewData', [AbilityController::class, 'loadNewData']);
    Route::get('listFavorite', [AbilityController::class, 'listFavorite']);
});

Route::prefix('pokemons')->group(function(){
    Route::get('index', [PokemonController::class, 'index']);
    Route::get('detail/{id}', [PokemonController::class, 'detail']);
    Route::get('loadNewData', [PokemonController::class, 'loadNewData']);
});

Route::prefix('favorites')->group(function(){
    Route::get('index', [FavoriteController::class, 'index']);
    Route::post('store', [FavoriteController::class, 'store']);
});