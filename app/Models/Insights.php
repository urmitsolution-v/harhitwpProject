<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insights extends Model
{
    use HasFactory;

     protected $table = 'insights';
    protected $fillable = [
        'title',
        'short_description',
        'banner',
        'slug',
        'image',
        'description',
        'image',
        'meta_title',
        'meta_tags',
        'meta_description',
        'status',
        'show_home_page',
    ];
    
}