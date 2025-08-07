<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class InclusivityPulse extends Model
{
    use HasFactory;

     protected $fillable = [
        'banner_title', 'banner_subdescription', 'banner_image',
        'content_title', 'content_description', 'content_image', 'content_layout',
        'timeline_title', 'timeline_image',
        'meta_title', 'meta_tags', 'meta_description','cms_title','cms_image','cms_editor'
    ];

    public function editors()
    {
        return $this->hasMany(InclusivityPulseEditor::class);
    }

    // public function teams()
    // {
    //     return $this->belongsToMany(Team::class, 'inclusivity_pulse_team');
    // }
    
 public function teams()
{
    return $this->hasMany(InclusivityPulseTeam::class, 'inclusivity_pulse_id');
}   
}