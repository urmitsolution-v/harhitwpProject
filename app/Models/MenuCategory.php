<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    use HasFactory;

     protected $fillable = ['title', 'slug', 'status', 'type','position','parent_category','tools','breadcump_data','contentsection','link_type','external_link'];

      public function parent()
    {
        return $this->belongsTo(MenuCategory::class, 'parent_category');
    }

    // 👇 Relation to submenus (children)
    public function submenus()
    {
        return $this->hasMany(MenuCategory::class, 'parent_category');
    }

    }