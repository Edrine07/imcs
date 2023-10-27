<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineList extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicine_name',
        'medicine_type'
    ];

    public function medTakeName()
    {
        return $this->belongsToMany(Medicine::class, 'medicine_id');
    }
}
