<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'destination',
        'password',
        'phone',
        'address',
        'image',
        'company_name',
        'team_type',
        'job_title',
        'company_address',
        'gstin',
        'domain',
        'is_block',
        'codeid',
        'role',
        'role_type',
        'remember_token',
        'is_verify',
    ];

    public function detail()
{
    return $this->hasOne(UserDetail::class);
}

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


     static public function GetSingleEmail($email){
        return User::where('email', '=', $email)->first();
    }
    static public function GetSingleToken($token){
        return User::where('remember_token', '=', $token)->first();
    }


}