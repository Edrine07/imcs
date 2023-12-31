<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'bp',
        'cr',
        'rr',
        't',
        'ht',
        'wt',
        'symptoms',
        'diagnosis',
    ];


    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function medicine()
    {
        return $this->hasMany(Medicine::class, 'medicine_id');
    }
}
