<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Prescription;

class WalkinController extends Controller
{
    public function createPatient()
    {

        return view("walkin.create-patient");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'bp' => 'required',
            'cr' => 'required',
            'rr' => 'required',
            't' => 'required',
            'wt' => 'required',
            'ht' => 'required',
            'symptoms' => 'required',
            'diagnosis' => 'required'
        ]);

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
            'appointment_date' => now()->format('Y-m-d'),
            'appointment_time' => now()->format('h:i'),
        ]);


        Prescription::create([
            'appointment_id' => $appointment->id,
            'bp' => $validated['bp'],
            'cr' => $validated['cr'],
            'rr' => $validated['rr'],
            't' => $validated['t'],
            'wt' => $validated['wt'],
            'ht' => $validated['ht'],
            'symptoms' => $validated['symptoms'],
            'diagnosis' => $validated['diagnosis']
        ]);

        $appointment->update([
            'appointment_status' => 'Completed'
        ]);

        return redirect()->route('patient.med-history', $patient->id)->with('success', 'Consultation completed!');
    }
}
