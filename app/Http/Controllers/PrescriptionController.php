<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Medicine;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function Prescription () {

        return view('prescription.index');

    }

    public function CreatePrescription ()
    {
        $data = Patient::all();
        return view('prescription.create', ['data'=>$data]);
    }

    public function StorePrescription (Request $request)
    {

        Patient::create([
            'visit_date' => $request->visit_date,
            'symtoms' => $request->symtoms,
            'diagnosis' => $request->diagnosis,
            'medicine_name' => $request->medicine_name,
            'medicine_type' => $request->medicine_type,
            'medicine_dose' => $request->medicine_dose,
            'medicine_unit' => $request->medicine_unit,
            'duration' => $request->duration
        ]);
    }

}
