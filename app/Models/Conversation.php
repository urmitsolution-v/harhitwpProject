<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

     protected $fillable = [
        'first_name', 'last_name', 'email', 'organization', 'message'
    ];
}