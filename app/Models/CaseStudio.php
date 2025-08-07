<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudio extends Model
{
    use HasFactory;

    protected $table = 'case_studio';
    protected $fillable = [
        'title',
        'date',
        'category',
        'slug',
        'description',
        'project_information',
        'meta_title',
        'meta_tags',
        'meta_description',
        'image',
        'status',
    ];
    public function get_Category()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }
}
