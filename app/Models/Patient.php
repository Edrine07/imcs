<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    use Searchable;

    protected $fillable = [
        //patient information
        'patient_first_name',
        'patient_last_name',
        'patient_gender',
        'patient_age',
        'patient_contact',
        'patient_address',

        //vital information
        'patient_bp',
        'patient_cr',
        'patient_rr',
        'patient_t',
        'patient_ht',
        'patient_wt',

   ];
}
