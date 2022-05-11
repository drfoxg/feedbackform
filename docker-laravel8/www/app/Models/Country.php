<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'iso', 'name', 'nicename', 'iso3', 'numcode', 'phonecode'];

    //By default laravel will expect created_at & updated_at column in your table.
    //By making it to false it will override the default setting.
    public $timestamps = false;
}
