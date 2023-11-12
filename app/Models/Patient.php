<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;

class Patient extends Model
{
    use HasFactory, Notifiable;

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

    public function routeNotificationForVonage(Notification $notification): string
    {
        return $this->contact;
    }

    public function appointment()
    {
        return $this->belongsToMany(Appointment::class);
    }

    public function getFullNameAttribute()
    {
        return " {$this->lastname}, {$this->firstname}";
    }
}
