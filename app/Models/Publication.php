<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'description', 'published_by',
        'image', 'button_name', 'button_url', 'target',
    ];
}