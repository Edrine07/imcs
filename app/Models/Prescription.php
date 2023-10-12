<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillble = [
        // Date
        'visit_date',
        'symtoms',
        // Vital Signs
        'diagnosis',
        'medicine_name',
        'medicine_type',
        'medicine_dose',
        'ht',
        'wt',
        // Medicine
        'medicine_unit',
        'duration',
    ];
}
