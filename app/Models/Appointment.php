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
        'appointment_date' => 'date'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function prescription()
    {
        return $this->hasOne(Prescription::class,'appointment_id');
    }



}
