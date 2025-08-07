<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryContent extends Model
{
    use HasFactory;

      protected $fillable = [
        'country_id',
        'description',
        'youtube_iframe',
        'button_name',
        'button_link',
        'button_target',
        'layout',
        'title',
        'meta_title',
        'meta_description',
        'meta_tags',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}