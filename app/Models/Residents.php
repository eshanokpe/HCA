<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Residents extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'residents'; // Use square brackets to define an array with 'admin' attribute
    protected $fillable = [
        'hca_no',
        'title',
        'fullname',
        'dob',
        'address',
        'email',
        'gender',
        'maritalstatus',
        'room_no',
        'nationalty',
        'language',
        'next_of_kin',
        'relationship',
        'phone_no',
        'nextofkin_address',
        'nextofkin_gender',
    ];
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
        'password' => 'hashed',
    ];
}
