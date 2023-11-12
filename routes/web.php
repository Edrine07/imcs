<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\BusinessHourController;
use App\Http\Controllers\TodayCheckupController;
use App\Http\Controllers\WalkinController;
use App\Http\Controllers\MedicineListController;

Route::middleware(['guest'], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::controller(AppointmentController::class)->prefix('appointment')->group(function () {
        Route::get('/', 'makeAppointment')->name('appointment.reserve');
        Route::store('/store', 'reserveAppointmentStore')->name('appointment.reserve_appointment');
        Route::get('/find-patient', 'findPatient')->name('appointment.find');
        Route::post('/appointment/patient-find-store/{patient}', 'findPatient')->name('appointment.findPatient');
        Route::get('/appointment', 'appoint')->name('appointment.appointment');
    });

    Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
    Route::post('/admin/session', [AdminController::class, 'store'])->name('admin.session');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');

    Route::get('/prescription/create', [PrescriptionController::class, 'CreatePrescription'])->name('prescription.create');
    Route::post('/prescription/store', [PrescriptionController::class, 'StorePrescription'])->name('prescription.store');
    Route::get('/prescription', [PrescriptionController::class, 'Prescription'])->name('prescription.index');

    Route::post('/admin/appointment/create', [AppointmentController::class, 'AppointmentStore'])->name('appointment.create');
    Route::get('/admin/appointment', [AppointmentController::class, 'Appointment'])->name('appointment.index');
    Route::get('admin/new-appointments', [AppointmentController::class, 'newAppointments'])->name('appointment.new');
    Route::get('/appointment/aprove/{appointment}', [AppointmentController::class, 'approve'])->name('appointment.approve');
    Route::get('/appointment/cancel/{appointment}', [AppointmentController::class, 'cancel'])->name('appointment.cancel');


    Route::get('/admin/today-checkup', [TodayCheckupController::class, 'index'])->name('checkup.index');
    Route::get('/admin/today-checkup/consult/{appointment}', [TodayCheckupController::class, 'consult'])->name('checkup.consult');
    Route::post('/admin/today-checkup/consult-store/{appointment}', [TodayCheckupController::class, 'storeConsult'])->name('checkup.store-consult');

    Route::get('/admin/patient', [PatientController::class, 'Patient'])->name('patient.index');
    Route::get('/admin/patient/medical-history/{patient}', [PatientController::class, 'medHistory'])->name('patient.med-history');
    Route::post('/admin/patient/medical-store/{app}', [PatientController::class, 'storeMedToTake'])->name('patient.med-store');


    Route::get('/admin/medicine-list', [MedicineListController::class, 'index'])->name('med-list.index');
    Route::post('/admin/medicine-store', [MedicineListController::class, 'store'])->name('med-list.store');

    Route::get('/admin/medical/{id}', [MedicalController::class, 'MedicalShow'])->name('medical.show');
    Route::get('/admin/print_pdf/{id}', [MedicalController::class, 'MedicalPDF'])->name('pdf.index');
    Route::get('/admin/medical', [MedicalController::class, 'SearchMedical'])->name('medical.index');

    Route::get('/admin/patient/create', [PatientController::class, 'CreatePatient'])->name('patient.create');
    Route::get('/admin/patient/{id}', [PatientController::class, 'ShowPatient'])->name('patient.show');
    Route::post('/admin/patient/store', [PatientController::class, 'StorePatient'])->name('patient.store');
    Route::get('/admin/patient/edit/{id}', [PatientController::class, 'EditPatient'])->name('patient.edit');
    Route::patch('/admin/patient/{id}', [PatientController::class, 'UpdatePatient'])->name('patient.update');
    Route::delete('/admin/{id}', [PatientController::class, 'DestroyPatient'])->name('patient.destroy');


    Route::get('/schedule', [BusinessHourController::class, 'BusinessHour'])->name('appointment.appointment_hours');
    Route::post('/schedule/update', [BusinessHourController::class, 'BusinessHourUpdate'])->name('appointment_hours.update');

    Route::get('/walkin/create-patient', [WalkinController::class, 'createPatient'])->name('walkin.create-patient');
    Route::post('/walkin/create-patient', [WalkinController::class, 'store'])->name('walkin.store-patient');
});
