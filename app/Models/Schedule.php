<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Schedule extends Authenticatable
{
    protected $fillable = [
        'staff_type_name',
        'shift_type',
        'date',
        'hca1',
        'hca2',
        'floor1',
        'hca3',
        'hca4',
        'floor2',
        'hca5',
        'hca6',
        'floor3',
        'nurse1',
        'nursefloor1',
        'nurse2',
        'nursefloor2',
    ];

    // Define any relationships here, if needed
}

