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
        return view('appointment.reserve');
    }

    public function ReserveAppointmentStore(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'nullable',
            'firstname' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'selectedDate' => 'required',
            'time_appointment' => 'required',
        ]);

        // dd($validated);
        $patient = Patient::create([
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'birthdate' => $validated['birthdate'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
            'contact' => $validated['contact'],
            'address' => $validated['address'],
        ]);

        $appointment = Appointment::create([
            'patient_id' => $patient->id,
            'appointment_date' => $validated['selectedDate'],
            'appointment_time' => $validated['time_appointment'],
        ]);

        return redirect()->back()->with('success', 'Appointment set successfully. Please wait for confirmation.');
    }

    public function Appointment()
    {

        $appointments = Appointment::where('appointment_status', 'Pending')->get();

        return view('appointment.index', compact('appointments'));
    }

    public function Appoint()
    {
        $appointments = Appointment::all();

        return view('appointment.reserve', compact('appointments'));
    }
}
