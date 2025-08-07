<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationSetting extends Model
{
    use HasFactory;

      protected $fillable = [
        'title', 'sub_description', 'meta_title', 'meta_tags', 'meta_description',
    ];
}