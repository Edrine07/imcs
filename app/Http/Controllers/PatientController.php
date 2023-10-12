<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
class PatientController extends Controller
{
    public function Patient ()
    {
        return view ('patient.index', [
            'patients' => Patient::orderBy('updated_at', 'desc')->get()
        ]);
    }

    public function CreatePatient ()
    {
        return view ('patient.create');
    }

    public function StorePatient (Request $request)
    {

        $validate = $request->validate([
            'patient_first_name' => 'required|string|max:255',
            'patient_last_name' => 'required|string|max:255',
            'patient_gender' => 'required|string|in:Male,Female,Other',
            'patient_age' => 'required|integer|min:0',
            'patient_contact' => 'required|numeric|digits:11',
            'patient_address' => 'required|string|max:255',
            'patient_bp' => 'required|string|max:220',
            'patient_cr' => 'required|string|max:220',
            'patient_rr' => 'required|string|max:220',
            'patient_t' => 'required|string|max:220',
            'patient_ht' => 'required|string|max:220',
            'patient_wt' => 'required|string|max:202',
            // 'patient_first_name' => 'required|string|max:255',
            // 'patient_last_name' => 'required|string|max:255',
            // 'patient_gender' => 'required|string|in:Male,Female,Other',
            // 'patient_age' => 'required|integer|min:0',
            // 'patient_contact' => 'required|regex:/^(09|\+639|639)[0-9]{10}$/',

            // 'patient_address' => 'required|string|max:255',
            // 'patient_bp' => 'required|regex:/^\d{2,3}[-\/]\d{2,3}$/',

            // 'patient_cr' => 'required|numeric|min:0|max:300',
            // 'patient_rr' => 'required|numeric|min:0|max:100',
            // 'patient_t' => 'required|numeric|min:0|max:50',
            // 'patient_ht' => 'required|numeric|min:0|max:300',
            // 'patient_wt' => 'required|numeric|min:0|max:300',
        ]);

        Patient::create([
            'patient_id' => $request->patient_id,
            'patient_first_name' => $request->patient_first_name,
            'patient_last_name' => $request->patient_last_name,
            'patient_gender' => $request->patient_gender,
            'patient_age' => $request->patient_age,
            'patient_contact' => $request->patient_contact,
            'patient_address' => $request->patient_address,

            'patient_bp' => $request->patient_bp,
            'patient_cr' => $request->patient_cr,
            'patient_rr' => $request->patient_rr,
            'patient_t' => $request->patient_t,
            'patient_ht' => $request->patient_ht,
            'patient_wt' => $request->patient_wt,
        ]);

        notify()->emotify('success', 'Your data was successfully created');
        return redirect(route('patient.index'));

    }


    public function ShowPatient ($id)
    {
        $patient = Patient::find($id);
        return view('patient.show', compact('patient'));
    }


    public function EditPatient ($id)
    {
        return view('patient.edit', [
            'patients' => Patient::where('id', $id)->first()
        ]);
    }

    public function UpdatePatient(Request $request, string $id)
    {
        Patient::where('id', $id)->update([
            //patient information
            'patient_first_name' => $request->patient_first_name,
            'patient_last_name' => $request->patient_last_name,
            'patient_gender' => $request->patient_gender,
            'patient_age' => $request->patient_age,
            'patient_contact' => $request->patient_contact,
            'patient_address' => $request->patient_address,

            //vital information
            'patient_bp' => $request->patient_bp,
            'patient_cr' => $request->patient_cr,
            'patient_rr' => $request->patient_rr,
            'patient_t' => $request->patient_t,
            'patient_ht' => $request->patient_ht,
            'patient_wt' => $request->patient_wt,
        ]);

        notify()->emotify('success', 'Your data was successfully updated');
        return redirect(route('patient.index'));
    }

}
