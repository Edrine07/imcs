<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\VitalController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\BusinessHourController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:admin'])->group(function () {


    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    // Admin Logout
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    // Admin Profile
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

    // Vital Signs
    Route::get('/vital_signs', [VitalController::class, 'VitalSigns'])->name('vital.index');

    // Consultation
    Route::get('/consultation', [ConsultationController::class, 'Consultation'])->name('consultation.index');

    // Diagnosis
    Route::get('/diagnosis', [DiagnosisController::class, 'Diagnosis'])->name('diagnosis.index');

    // Prescription
    Route::get('/prescription/create', [PrescriptionController::class, 'CreatePrescription'])->name('prescription.create');
    Route::post('/prescription/store', [PrescriptionController::class, 'StorePrescription'])->name('prescription.store');
    Route::get('/prescription', [PrescriptionController::class, 'Prescription'])->name('prescription.index');

    // Appointment
    Route::post('/admin/appointment/create', [AppointmentController::class, 'AppointmentStore'])->name('appointment.create');
    Route::get('/admin/appointment', [AppointmentController::class, 'Appointment'])->name('appointment.index');
    Route::get('/appointment/aprove', [AppointmentController::class, 'AppoveAppointment'])->name('approve.appointment');
    Route::get('/appointment/cancel', [AppointmentController::class, 'CancelAppointment'])->name('cancel.appointment');

    //  Medical
    Route::get('/admin/medical/{id}', [MedicalController::class, 'MedicalShow'])->name('medical.show');
    Route::get('/admin/print_pdf/{id}', [MedicalController::class, 'MedicalPDF'])->name('pdf.index');
    Route::get('/admin/medical', [MedicalController::class, 'SearchMedical'])->name('medical.index');

     // Patient
     Route::get('/admin/patient/create', [PatientController::class, 'CreatePatient'])->name('patient.create');
     Route::get('/admin/patient', [PatientController::class, 'Patient'])->name('patient.index');
     Route::get('/admin/patient/{id}', [PatientController::class, 'ShowPatient'])->name('patient.show');
     Route::post('/admin/patient/store', [PatientController::class, 'StorePatient'])->name('patient.store');
     Route::get('/admin/patient/edit/{id}', [PatientController::class, 'EditPatient'])->name('patient.edit');
     Route::patch('/admin/patient/{id}', [PatientController::class, 'UpdatePatient'])->name('patient.update');
     Route::delete('/admin/{id}', [PatientController::class, 'DestroyPatient'])->name('patient.destroy');

     // Schedule
     Route::get('/schedule', [BusinessHourController::class, 'BusinessHour'])->name('appointment.appointment_hours');
     Route::post('/schedule/update', [BusinessHourController::class, 'BusinessHourUpdate'])->name('appointment_hours.update');

     // Reserved
     Route::get('/reserve', [AppointmentController::class, 'MakeAppointment'])->name('appointment.reserve');
     Route::post('/reserve/appointent', [AppointmentController::class, 'ReserveAppointment'])->name('appointment.reserve_appointment');

}); // End Group Admin Middleware

// Admin Login
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::get('/appointment', [AppointmentController::class, 'Appoint'])->name('admin.appointment');
Route::get('/appointments', [AppointmentsController::class, 'Appointments'])->name('appointments.index');

require __DIR__.'/auth.php';



