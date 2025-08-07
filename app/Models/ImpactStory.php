<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpactStory extends Model
{
    use HasFactory;

      protected $fillable = [
        'menu_title','title','slug','short_description', 'content', 'status',
        'meta_title', 'meta_tags', 'meta_description','image'
    ];
    
}