<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicine_id',
        'medicine_dose',
        'medicine_unit',
        'duration',
    ];

    public function prescription()
    {
        return $this-> belongsTo(Prescription::class);
    }
}
