<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whoitems extends Model
{
    use HasFactory;

     protected $table = 'who_we_are_sections';
     
      protected $fillable = [
        'title',
        'description',
        'status',
    ];
    
}