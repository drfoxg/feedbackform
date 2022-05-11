<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackNew extends Model
{
    use HasFactory;
    protected $fillable = ['countryId', 'username', 'phone', 'message'];

    //By default laravel will expect created_at & updated_at column in your table.
    //By making it to false it will override the default setting.
    public $timestamps = false;
}
