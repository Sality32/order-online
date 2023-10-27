<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model ;

class Ability extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'abilities';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'is_main_series',
        'generations',
        'names',
        'effect_entries',
        'effect_changes',
        'flavor_text_entries',
        'pokemon'
    ];
}
