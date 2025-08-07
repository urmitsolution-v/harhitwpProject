<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industries extends Model
{
    use HasFactory;

    protected $table = 'industry';
    protected $fillable = [
        'post_title',
        'title',
        'slug',
        'meta_title',
        'cmstitle',
        'meta_tags',
        'meta_description',
        'lists',
        'faq_status',
        'image',
        'description',
        'status',
    ];


}