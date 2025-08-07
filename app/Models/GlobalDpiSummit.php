<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalDpiSummit extends Model
{
    use HasFactory;
    protected $table = 'global_dpi_summits';
      protected $fillable = [
        'banner_title', 'banner_sub_description', 'banner_button_name',
        'banner_link', 'banner_link_target', 'banner_image',
        'content1_title', 'content1_description', 'content1_image', 'content1_style',
        'image_section',
        'content2_title', 'content2_description', 'content2_image', 'content2_style',
         'meta_title','dpi_image',
    'meta_tags',
    'meta_description',
    ];

    public function logos()
    {
        return $this->hasMany(GlobalDpiSummitLogo::class, 'summit_id');
    }
}