<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillble = [
        'bp',
        'cr',
        'rr',
        't',
        'ht',
        'wt',
        'symtoms',
        'diagnosis',
        
        // 'medicine_name',
        // 'medicine_type',
        // 'medicine_dose',
        // 'ht',
        // 'wt',
        // // Medicine
        // 'medicine_unit',
        // 'duration',
    ];
}
