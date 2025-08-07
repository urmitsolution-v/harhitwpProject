<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contactus';
    protected $fillable = [
        'name',
        'email',
        'code',
        'services',
        'message',
        'phone',
    ];
}
