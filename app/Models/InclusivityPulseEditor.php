<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InclusivityPulseEditor extends Model
{
    use HasFactory;

     protected $fillable = ['inclusivity_pulse_id', 'editor_layout', 'editor_content'];

    public function pulse()
    {
        return $this->belongsTo(InclusivityPulse::class);
    }
    
}