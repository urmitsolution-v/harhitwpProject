<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'title',
        'category',
        'lists',
        'description',
        'cmstitle',
        'long_description',
        'short_description',
        'short_desc',
        'faq_status',
        'image',
        'baner_img',
        'featured',
        'meta_title',
        'icon',
        'meta_tags',
        'meta_description',
        'status',
    ];

    public function get_Category()
    {
        return $this->belongsTo(Category::class, 'category');
    }
}