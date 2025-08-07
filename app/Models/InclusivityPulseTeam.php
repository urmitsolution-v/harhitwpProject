<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InclusivityPulseTeam extends Model
{
    use HasFactory;
    
      protected $table = 'inclusivity_pulse_teams';
    
        protected $fillable = [
        'inclusivity_pulse_id',
        'name',
        'position',
        'company',
        'image',
    ];

    public function pulse()
    {
        return $this->belongsTo(InclusivityPulse::class, 'inclusivity_pulse_id');
    }

}
