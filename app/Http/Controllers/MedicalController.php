<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class MedicalController extends Controller
{
    // public function Medical ()
    // {
    //     return view ('medical.index',[
    //         'patients' => Patient::orderBy('updated_at', 'desc')->get()
    //     ]);
    // }

    public function MedicalShow (string $id)
    {
        return view('medical.show', [
            'patients' => Patient::findOrFail($id)
        ]);
    }

    // Export to pdf
    public function MedicalPDF (string $id)
    {

        $patient = Patient::find($id);

        $pdf = Pdf::loadView('pdf.index', compact('patient'));
        return $pdf->download('Medical.pdf');
    }

    // Search Medical Record
    public function SearchMedical (Request $request)
    {
        if ($request->filled('search'))
        {
            $patients = Patient::search($request->search)->get();
        }else {
            $patients = Patient::get();
            $patients = Patient::paginate(2);
        }

        return view ('medical.index', compact('patients'));
    }

}
