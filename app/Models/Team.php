<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';  // Table name (optional, Laravel assumes plural by default)
    protected $fillable = [
        'name',
        'sub_title',
        'phone',
        'slug',
        'email',
        'show_about',
        'image',
        'since',
        'description',
        'experience',
        'address',
        'facebook',
        'twitter',
        'instagram',
        'status'
    ];
}
