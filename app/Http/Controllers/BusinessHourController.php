<?php

namespace App\Http\Controllers;

use App\Models\BusinessHour;
use Illuminate\Http\Request;

class BusinessHourController extends Controller
{
    public function BusinessHour ()
    {
        $businessHours = BusinessHour::all();
        return view ('appointment.appointment_hours', compact('businessHours'));
    }

    public function BusinessHourUpdate(Request $request)
    {
        $data = array_values($request->all()['data']);

        BusinessHour::upsert($data, ['day']);

        return back();
    }
}
