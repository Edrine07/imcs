<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\BusinessHour;
use Illuminate\Http\Request;
use App\Notifications\ApprovedNotif;
use App\Notifications\CancelledNotif;

class AppointmentController extends Controller
{

    public function getAppointments()
    {
        $appointments = Appointment::where('appointment_type', '=', 'Appointment')->get();
        $jsonAppointments = json_encode($appointments);

        return $jsonAppointments;
    }

    public function appoint()
    {
        $businessHours = BusinessHour::all();
        $appointments = Appointment::all();

        // filter the businessHours to get only the date column
        $businessHours = $businessHours->map(function ($item) {
            return $item->date;
        });

        return view('appointment.reserve', compact('businessHours', 'appointments'));
    }

    public function existingPatient()
    {
        $patients = Patient::all();
        $businessHours = BusinessHour::all();
        $appointments = Appointment::all();


        // filter the businessHours to get only the date column
        $businessHours = $businessHours->map(function ($item) {
            return $item->date;
        });
        return view('appointment.reserve-existing', compact('patients', 'businessHours', 'appointments'));
    }

    public function appointment()
    {

        $appointments = Appointment::where('appointment_type', '=', 'Appointment')->orderByRaw("FIELD(appointment_status, 'Pending') DESC")
            ->orderBy('appointment_date', 'asc')
            ->orderBy('appointment_time', 'asc')
            ->paginate(10);



        // dd($appointments);
        return view('appointment.index', compact('appointments'));
    }

    public function newAppointments()
    {
        $appointments = Appointment::whereIn('appointment_status', ['Pending', 'Approved'])->where('appointment_date', '=', date('Y-m-d'))->paginate(10);
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
            'appointment_date' => $validated['selectedDate'],
            'appointment_time' => $validated['time_appointment'],
            'appointment_type' => 'Appointment',
        ]);

        return redirect()->back()->with('success', 'Appointment set successfully. Please wait for an sms confirmation of your appointment.');
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

        // $timestamp = Carbon::createFromFormat('H:i', $validated['time_appointment'])->toTimeString();

        $selectedDate = Carbon::parse($validated['selectedDate']);

        $startOfWeek = $selectedDate->startOfWeek()->format('Y-m-d');
        $endOfWeek = $selectedDate->endOfWeek()->subDays(2)->format('Y-m-d');

        // dd($now, $startOfWeek, $endOfWeek);

        // Check if the patient already has a pending appointment within the current week
        $appointmentWithinWeek = Appointment::where('patient_id', $patient_id)
            ->where('appointment_date', '>=', $startOfWeek)
            ->where('appointment_date', '<=', $endOfWeek)
            ->where('appointment_status', 'Pending')
            ->first();

        // If appointment exists within the week, return with an error message
        if ($appointmentWithinWeek) {
            return redirect()->back()->with('error', 'Patient already has a pending appointment this week. Please wait for an SMS approval.');
        }

        // If no appointment within the week, proceed to the next check
        $appointment = Appointment::where('patient_id', $patient_id)
            ->where('appointment_date', $validated['selectedDate'])
            ->where('appointment_time', $validated['time_appointment'])
            ->where('appointment_status', 'Pending')
            ->first();

        // If appointment exists for the selected date and time, return with an error message
        if ($appointment) {
            return redirect()->back()->with('error', 'Patient already has a pending appointment with the same date and time. Please wait for an SMS approval.');
        } else {
            $appointment = Appointment::create([
                'patient_id' => $patient_id,
                'appointment_date' => $validated['selectedDate'],
                'appointment_time' => $validated['time_appointment'],
                'appointment_type' => 'Appointment',
            ]);

            return redirect()->back()->with('success', 'Appointment set successfully. Please wait for an sms confirmation of your appointment.');
        }
    }

    public function approve(Appointment $appointment)
    {
        $appointment->update([
            'appointment_status' => "Approved"
        ]);

        $patient = Patient::where('id', $appointment->patient_id)
            ->first();

        $appointmentTime = Carbon::parse($appointment->appointment_time);

        $app = [
            'name' => $patient->full_name,
            'date' => $appointment->appointment_date->format('F d, Y'),
            'time' => $appointmentTime->format('H:i A')
        ];

        $patient->notify(new ApprovedNotif($app));

        return redirect()->back()->with('success', 'Appointment successfully approved!');
    }

    public function cancel(Appointment $appointment, Request $request)
    {
        $reason = $request->input('reason');

        $appointment->update([
            'appointment_status' => "Cancelled"
        ]);

        $patient = Patient::where('id', $appointment->patient_id)
            ->first();

        $appointmentTime = Carbon::parse($appointment->appointment_time);

        $reason = [
            'reason' => $reason,
            'name' => $patient->full_name,
            'date' => $appointment->appointment_date->format('F d, Y'),
            'time' => $appointmentTime->format('H:i a')
        ];

        $patient->notify(new CancelledNotif($reason));

        return redirect()->back()->with('success', 'Appointment successfully cancelled!');
    }

    // public function findPatient(Request $request, Patient $patient)
    // {

    //     $validated = $request->validate([
    //         'selectedDate' => 'required',
    //         'time_appointment' => 'required',
    //     ]);

    //     Appointment::create([
    //         'patient_id' => $patient->id,
    //         'appointment_date' => $validated['selectedDate'],
    //         'appointment_time' => $validated['time_appointment'],
    //     ]);

    //     return redirect()->route('admin.appointment')->with('success', 'Appointment successfully submitted, wait for an SMS Notification!');
    // }
}
