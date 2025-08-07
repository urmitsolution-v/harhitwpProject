<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

     protected $fillable = [
        'type', 'name', 'names', 'image', 'images', 'status', 'slug'
    ];

    protected $casts = [
        'names' => 'array',
        'images' => 'array',
    ];

    public function content()
{
    return $this->hasOne(CountryContent::class);
}
}