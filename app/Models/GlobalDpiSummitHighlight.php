<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalDpiSummitHighlight extends Model
{
    use HasFactory;

     protected $table = 'global_dpi_summits_highlights';

     protected $fillable = [
        'title',
        'logo',
        'button_name',
        'button_url',
        'button_target',
        'todos',
    ];

    protected $casts = [
        'todos' => 'array',
    ];
    
}