<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;


     protected $table = 'investments';
     
      protected $fillable = [
        'title',
        'sub_description',
        'todo_list',
        'meta_title',
        'meta_tags',
        'meta_description',
    ];

    protected $casts = [
        'todo_list' => 'array',
    ];
    
}