<?php

namespace App\Livewire;

use App\Models\Patient;
use Livewire\Component;

class FindPatient extends Component
{
    public $firstname;
    public $lastname;
    public $birthdate;
    public $patients;

    protected $listeners = ['findPatient'];

    public function mount()
    {
        $this->patients = collect(); // Initialize $patients as an empty collection
    }

    public function findPatient()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required|date',
        ]);

        // Perform the logic to find the patient based on the provided data
        $this->patients = Patient::where([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'birthdate' => $this->birthdate,
        ])->get();

        if ($this->patients->isNotEmpty()) {
            // Emit an event with the patient's ID
            $this->dispatch('patientFound', $this->patients->first()->id);
        }
    }

    public function render()
    {
        return view('livewire.find-patient');
    }
}
