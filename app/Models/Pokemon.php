<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $hidden = [ '_id'];
    protected $collection = 'pokemons';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'base_experience',
        'height',
        'order',
        'weight',
        'is_default',
        'abilities',
        'forms',
        'game_indices',
        'held_items',
        'moves',
        'location_area_encounters',
        'species',
        'sprites',
        'stats',
        'types',
        'past_types'
    ];
}
