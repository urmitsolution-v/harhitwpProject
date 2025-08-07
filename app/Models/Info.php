<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    protected $table = 'webinfo';
    protected $fillable = [
        'info_one',
        'info_two',
        'info_three',
        'image',
        'favicon',
        'image_2',
        'image1',
        'image2',
        'aboutlongtext',
        'image3',
    ];
}