<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicineList;

class MedicineListController extends Controller
{
    public function index()
    {
        $meds = MedicineList::orderBy('medicine_name', 'asc')->get();

        return view('medicine-list.index', compact('meds'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'medicine_name' => 'required',
            'medicine_type' => 'nullable',
        ]);

        MedicineList::create([
            'medicine_name' => $validated['medicine_name'],
            'medicine_type' => $validated['medicine_type'] ?? null,
        ]);

        return redirect()->route('med-list.index')->with('success', 'Successfully added new medicine!');
    }
}
