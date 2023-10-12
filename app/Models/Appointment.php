<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $casts = [
        'time' => 'datetime:H:i'
    ];

    protected $guarded = [];

    // protected $fillable = [
    //     'appointment_name',
    //     'appointment_phone',
    //     'appointment_address',
    //     'appointment_date',
    //     'appointment_time'
    // ];

}
