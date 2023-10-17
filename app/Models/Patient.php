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
        'firstname',
        'lastname',
        'gender',
        'birthdate',
        'age',
        'contact',
        'address',
    ];

    protected $casts = [
        'birthdate' => 'date'
    ];

    public function appointment()
    {
        return $this->belongsToMany(Appointment::class);
    }

    public function getFullNameAttribute()
    {

        return "{$this->firstname}, {$this->lastname}";
    }
}
