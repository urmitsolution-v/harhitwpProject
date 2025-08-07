<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    use HasFactory;


    protected $table = 'banners';
    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'status',
        'tab_option',
        'button_link',
        'button_name',
        'button_name2',
        'button_link2',
        'tab_option2',
        'url',
    ];


}