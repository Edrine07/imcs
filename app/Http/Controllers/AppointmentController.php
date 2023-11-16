<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Notifications\ApprovedNotif;

class AppointmentController extends Controller
{

    public function appoint()
    {
        $appointments = Appointment::all();
        // $patients = Patient::all();

        return view('appointment.reserve', compact('appointments'));
    }

    public function existingPatient()
    {
        $patients = Patient::all();

        return view('appointment.reserve-existing', compact('patients'));
    }

    public function appointment()
    {

        $appointments = Appointment::whereIn('appointment_status', ['Pending', 'Approved', 'Completed', 'Cancelled'])
            ->orderByRaw("FIELD(appointment_status, 'Pending') DESC")
            ->orderBy('appointment_date', 'asc')
            ->orderBy('appointment_time', 'asc')
            ->get();

        // dd($appointments);


        return view('appointment.index', compact('appointments'));
    }

    public function newAppointments()
    {
        $appointments = Appointment::whereIn('appointment_status', ['Pending', 'Approved'])->where('appointment_date', '=', date('Y-m-d'))->get();
        return view('appointment.new-appointment', compact('appointments'));
    }

    public function reserveAppointmentStore(Request $request)
    {
        $validated = $request->validate([
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

        // check first if patient already exists with the same firstname, lastname, and birthdate, and if exists, return with an error message
        $patient = Patient::where('firstname', $validated['firstname'])
            ->where('lastname', $validated['lastname'])
            ->where('birthdate', $validated['birthdate'])
            ->first();

        if ($patient) {
            return redirect()->back()->with('error', 'Patient already exists.');
        } else {
            $patient = Patient::create([
                'firstname' => $validated['firstname'],
                'lastname' => $validated['lastname'],
                'birthdate' => $validated['birthdate'],
                'age' => $validated['age'],
                'gender' => $validated['gender'],
                'contact' => $validated['contact'],
                'address' => $validated['address'],
            ]);

            $timestamp = Carbon::createFromFormat('H:i', $validated['time_appointment'])->toTimeString();

            $appointment = Appointment::create([
                'patient_id' => $patient->id,
                'appointment_date' => $validated['selectedDate'],
                'appointment_time' => $timestamp,
            ]);

            return redirect()->back()->with('success', 'Appointment set successfully. Please wait for confirmation.');
        }
    }

    public function existingPatientStore(Request $request)
    {
        $patient_id = $request->input('patientId');

        // find patient with the patient_id
        $patient = Patient::where('id', $patient_id)->first();

        $validated = $request->validate([
            'patientId' => 'required',
            'selectedDate' => 'required',
            'time_appointment' => 'required',
        ]);
        $timestamp = Carbon::createFromFormat('H:i', $validated['time_appointment'])->toTimeString();

        // check first if the patient already has an appointment with the same date and time
        $appointment = Appointment::where('patient_id', $patient_id)
            ->where('appointment_date', $validated['selectedDate'])
            ->where('appointment_time', $timestamp)->where('appointment_status', 'Pending')
            ->first();

        // if appointment exists, return with an error message, else create new appointment
        if ($appointment) {
            return redirect()->back()->with('error', 'Patient already has a pending appointment with the same date and time. Please wait for an sms approval.');
        } else {
            $appointment = Appointment::create([
                'patient_id' => $patient_id,
                'appointment_date' => $validated['selectedDate'],
                'appointment_time' => $timestamp,
            ]);

            return redirect()->back()->with('success', 'Appointment set successfully. Please wait for confirmation.');
        }
    }

    public function approve(Appointment $appointment)
    {
        $appointment->update([
            'appointment_status' => "Approved"
        ]);

        $patient = Patient::where('id', $appointment->patient_id)
            ->first();

        $patient->notify(new ApprovedNotif());

        return redirect()->back()->with('success', 'Appointment successfully approved!');
    }

    public function cancel(Appointment $appointment)
    {
        $appointment->update([
            'appointment_status' => "Cancelled"
        ]);

        return redirect()->back()->with('success', 'Appointment successfully cancelled!');
    }

    public function findPatient(Request $request, Patient $patient)
    {

        $validated = $request->validate([
            'selectedDate' => 'required',
            'time_appointment' => 'required',
        ]);

        Appointment::create([
            'patient_id' => $patient->id,
            'appointment_date' => $validated['selectedDate'],
            'appointment_time' => $validated['time_appointment'],
        ]);

        return redirect()->route('admin.appointment')->with('success', 'Appointment successfully submitted, wait for an SMS Notification!');
    }
}
