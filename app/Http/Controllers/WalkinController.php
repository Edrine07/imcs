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

        // $medicines = MedicineList::all();

        return view("walkin.create-patient", compact('patient', 'appointments'));
    }

    public function walkins()
    {
        $appointments = Appointment::where('appointment_type', '=', 'Walk-in')->orderByRaw("FIELD(appointment_status, 'Pending') DESC")
            ->orderBy('appointment_date', 'asc')
            ->orderBy('appointment_time', 'asc')
            ->paginate(10);

        return view('walkin.index', compact('appointments'));
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
            'bp2' => 'required',
            'cr' => 'required',
            'rr' => 'nullable',
            't' => 'required',
            'wt' => 'required',
            'ht' => 'nullable',
            'symptoms' => 'required',
            'diagnosis' => 'required'
        ]);
        // dd($validated);

        $patient = Patient::where('firstname', $validated['firstname'])
            ->where('lastname', $validated['lastname'])
            ->where('birthdate', $validated['birthdate'])
            ->first();

        if ($patient) {
            return redirect()->back()->with('error', 'Patient already exists.');
        }

        $patient = Patient::create([
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'birthdate' => $validated['birthdate'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
            'contact' => '63' . $validated['contact'],
            'address' => $validated['address'],
        ]);

        $appointment = Appointment::create([
            'patient_id' => $patient->id,
            'appointment_date' => now()->format('Y-m-d'),
            'appointment_time' => now()->format('H:i:s'),
            'appointment_type' => 'Walk-in',
        ]);


        Prescription::create([
            'appointment_id' => $appointment->id,
            'bp' => $validated['bp'] . '/' . $validated['bp2'],
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
