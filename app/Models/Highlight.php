<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    use HasFactory;

      protected $table = 'highlightscontent';
      
     protected $fillable = [
        'title', 'subtitle', 'image', 'month', 'year', 'url', 'status'
    ];
    
}