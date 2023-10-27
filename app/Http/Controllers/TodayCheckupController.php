<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Prescription;

class TodayCheckupController extends Controller
{
    public function index()
    {

        $today = now()->format('Y-m-d');

        // dd($today);

        $appointments = Appointment::where('appointment_status', 'Approved')
            ->whereDate('appointment_date', $today)
            ->orderBy('appointment_time', 'asc')
            ->get();


        return view('today-checkup.index', compact('appointments'));
    }

    public function consult(Appointment $appointment)
    {

        return view('today-checkup.consult', compact('appointment'));
    }

    public function storeConsult(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'bp' => 'required',
            'cr' => 'required',
            'rr' => 'required',
            't' => 'required',
            'wt' => 'required',
            'ht' => 'required',
            'symptoms' => 'required',
            'diagnosis' => 'required'
        ]);

        $appointment->update([
            'appointment_status' => 'Completed'
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

        return redirect()->route('patient.med-history', $appointment->patient_id)->with('success', 'Consultation completed!');

    }

    public function noShow(Appointment $appointment)
    {
        $appointment->delete();


    }

}
