<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    
    protected $table = 'user_details';
    
    protected $fillable = [
        'user_id',
        'aadhar_name',
        'district_name',
    ];

       public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}