<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Schedule extends Authenticatable
{
    protected $fillable = ['staff_type_name', 'staff_type',  'shift_type', 'day', 'start_time', 'end_time', 'floor' ];

    // Define any relationships here, if needed
}

