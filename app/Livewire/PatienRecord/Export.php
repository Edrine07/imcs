<?php

namespace App\Livewire\PatienRecord;

use Livewire\Component;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\Medicine;

class Export extends Component
{
    public $app;
    public $path_export = 'docx/imsc.docx';

    public function export()
    {
        $path = storage_path($this->path_export);
        $templateProcessor = new TemplateProcessor($path);

        $templateProcessor->setValue('name', $this->app->patient->fullname);
        $templateProcessor->setValue('address', $this->app->patient->address);
        $templateProcessor->setValue('contact', $this->app->patient->contact);
        $templateProcessor->setValue('age', $this->app->patient->age);
        $templateProcessor->setValue('bday', $this->app->patient->birthdate->format('F d, Y'));
        $templateProcessor->setValue('sex', $this->app->patient->gender);

        $templateProcessor->setValue('bp', $this->app->prescription->bp);
        $templateProcessor->setValue('cr', $this->app->prescription->cr);
        $templateProcessor->setValue('rr', $this->app->prescription->rr);
        $templateProcessor->setValue('t', $this->app->prescription->t);
        $templateProcessor->setValue('wt', $this->app->prescription->wt);
        $templateProcessor->setValue('ht', $this->app->prescription->ht);
        $templateProcessor->setValue('sypmtoms', $this->app->prescription->symptoms);
        $templateProcessor->setValue('diagnosis', $this->app->prescription->diagnosis);

        $medTake = Medicine::where('appointment_id', $this->app->id)
        ->get();

        $templateProcessor->cloneRow('medname', count($medTake));

        foreach( $medTake as $index => $code)
        {
            $templateProcessor->setValue('medname#' . ($index + 1), $code->medName->medicine_name);
            $templateProcessor->setValue('dosage#' . ($index + 1), $code->medicine_dose);
            $templateProcessor->setValue('qty#' . ($index + 1), $code->medicine_unit);
            $templateProcessor->setValue('duration#' . ($index + 1), $code->duration);

        }

        $filename = 'Medical Record_' . $this->app->patient->lastname;
        $tempPath = 'reports/' . $filename . '.docx';
        $templateProcessor->saveAs($tempPath);
        return response()->download(public_path($tempPath));
    }

    public function render()
    {
        return view('livewire.patien-record.export');
    }
}
