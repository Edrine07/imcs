<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function Appoint()
    {
        $appointments = Appointment::all();

        return view('appointment.reserve', compact('appointments'));
    }

    public function Appointment()
    {

        $appointments = Appointment::whereIn('appointment_status', ['Pending', 'Approved'])
        ->orderByRaw("FIELD(appointment_status, 'Pending') DESC")
        ->orderBy('appointment_date', 'asc')
        ->orderBy('appointment_time', 'asc')
        ->get();

        return view('appointment.index', compact('appointments'));
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

    public function approve(Appointment $appointment)
    {
        $appointment->update([
            'appointment_status' => "Approved"
        ]);

        return redirect()->back()->with('success', 'Appointment successfully approved!');
    }

    public function cancel(Appointment $appointment)
    {
        $appointment->update([
            'appointment_status' => "Cancelled"
        ]);

        return redirect()->back()->with('success', 'Appointment successfully cancelled!');
    }

}
