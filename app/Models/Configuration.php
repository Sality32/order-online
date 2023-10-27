<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'configurations';
    protected $primaryKey = 'name';
    protected $fillable = [
        'name',
        'detail_config',
    ];
}
