<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\BusinessHour;
use Illuminate\Http\Request;

class BusinessHourController extends Controller
{
    public function BusinessHour()
    {
        $appointments = Appointment::where('appointment_date', '>=', date('Y-m-d'))
            ->where('appointment_status', '=', 'Completed')
            ->get();

        $appointmentCount = [];

        foreach ($appointments as $appointment) {
            $date = $appointment->appointment_date->format('Y-m-d'); // Assuming 'appointment_date' is a Carbon date object

            if (!isset($appointmentCount[$date])) {
                $appointmentCount[$date] = 1;
            } else {
                $appointmentCount[$date]++;
            }
        }
        $businessHours = BusinessHour::all();





        return view('appointment.appointment_hours', compact('businessHours', 'appointmentCount'));
    }

    public function BusinessHourUpdate(Request $request)
    {

        $validated = $request->validate([
            'appointment_dates' => 'required',
        ]);

        $appointmentDatesArray = explode(',', $validated['appointment_dates']);

        // dd($appointmentDatesArray);

        foreach ($appointmentDatesArray as $date) {
            BusinessHour::firstOrCreate([
                'date' => $date,
            ]);
        }

        return redirect()->back()->with('success', 'Dates not available are saved!');
    }

    public function destroy(BusinessHour $hour)
    {
        $hour->delete();

        return redirect()->back()->with('success', 'Date deleted successfully!');
    }
}
