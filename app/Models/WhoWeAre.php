<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhoWeAre extends Model
{
    use HasFactory;

       protected $table = 'who_we_are';

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'background',
        'strategy',
        'meta_title',
        'meta_tags',
        'meta_description',
    ];
    
}