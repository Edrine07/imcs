<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'appointment_date',
        'appointment_time',
        'appointment_status'
    ];

    protected $casts = [
        'time' => 'date'
    ];


}
