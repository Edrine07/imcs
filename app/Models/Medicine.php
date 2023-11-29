<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'medicine_name',
        'medicine_dose',
        'medicine_unit',
        'medicine_frequency',
        'duration',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }

    public function medName()
    {
        return $this->belongsTo(MedicineList::class, 'medicine_id');
    }
}
