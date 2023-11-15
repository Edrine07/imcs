<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Appointment;
use App\Models\MedicineList;
use App\Models\Prescription;
use Illuminate\Http\Request;

class WalkinController extends Controller
{
    public function createPatient(Patient $patient)
    {

        $appointments = Appointment::where('patient_id', $patient->id)
            ->where('appointment_status', 'Completed')
            ->orderBy('appointment_date', 'asc')
            ->get();

        $medicines = MedicineList::all();

        return view("walkin.create-patient", compact('patient', 'appointments', 'medicines'));
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
