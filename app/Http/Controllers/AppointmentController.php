<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use App\Models\BusinessHour;
use App\Models\Patient;
use App\Services\AppointmentService;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{

    public function MakeAppointment()
    {
        // $datePeriod = CarbonPeriod::create(now(), now()->addDays(6));

        // $appointments = [];
        // foreach($datePeriod as $date)
        // {
        //     $dayName = $date->format('l');

        //     $businessHour = BusinessHour::where('day', $dayName)->first()->TimesPeriod;

        //     $currentAppointments = Appointment::where('date', $date->toDateString())->pluck('time')->map(function($time){
        //         return $time->format('H:i');
        //     })->toArray();

        //     $availableHours = array_diff($businessHour, $currentAppointments);

        //     $appointments[] = [
        //         'day_name' => $dayName,
        //         'date' => $date->format('d M'),
        //         'full_date' => $date->format('Y-m-d'),
        //         'available_hours' => $availableHours
        //     ];
        // }

        return view('appointment.reserve');
    }

    public function ReserveAppointment (Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'address' => 'required',
        ]);

        $patient = Patient::create([
            
        ]);

    }

    public function Appointment()
    {

        $appointments = Appointment::all();
        return view('appointment.index', compact('appointments'));
    }

    public function Appoint()
    {
        $appointments = Appointment::all();

        return view('appointment.reserve', compact('appointments'));
    }
}
