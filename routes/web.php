<?php

use App\Http\Livewire\FindPatient;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WalkinController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BusinessHourController;
use App\Http\Controllers\MedicineListController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\TodayCheckupController;

Route::middleware(['guest', 'web'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::prefix('appointment')->group(function () {
        Route::get('/', [AppointmentController::class, 'makeAppointment'])->name('appointment.reserve');
        Route::post('/store', [AppointmentController::class, 'reserveAppointmentStore'])->name('appointment.reserve_appointment');
        Route::post('/existing-store', [AppointmentController::class, 'existingPatientStore'])->name('appointment.existing-store');
        Route::post('/find-patient', [AppointmentController::class, 'findPatient'])->name('appointment.find');
        Route::post('/appointment/patient-find-store/{patient}', [AppointmentController::class, 'findPatient'])->name('appointment.findPatient');
        Route::get('/appointment', [AppointmentController::class, 'appoint'])->name('appointment.appointment');
        Route::get('/appointment/existing', [AppointmentController::class, 'existingPatient'])->name('appointment.existing');
    });

    Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
    Route::post('/admin/session', [AdminController::class, 'store'])->name('admin.session');
});



Route::middleware(['web', 'auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    // Route::post('/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

    Route::get('/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');

    Route::resource('prescription', PrescriptionController::class);
    // Route::resource('appointment', AppointmentController::class)->except(['show']);
    Route::get('new-appointments', [AppointmentController::class, 'newAppointments'])->name('appointment.new');
    Route::get('appointments', [AppointmentController::class, 'appointment'])->name('appointment.index');
    Route::get('appointment/approve/{appointment}', [AppointmentController::class, 'approve'])->name('appointment.approve');
    Route::get('appointment/cancel/{appointment}', [AppointmentController::class, 'cancel'])->name('appointment.cancel');
    Route::post('/consult-store', [PatientController::class, 'newConsultation'])->name('appointment.new-consult');


    Route::resource('checkup', TodayCheckupController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
    Route::get('checkup/consult/{appointment}', [TodayCheckupController::class, 'consult'])->name('checkup.consult');
    Route::post('checkup/consult-store/{appointment}', [TodayCheckupController::class, 'storeConsult'])->name('checkup.store-consult');

    // Route::resource('patient', PatientController::class)->except(['show']);
    Route::get('patient', [PatientController::class, 'patient'])->name('patient.index');
    Route::get('patient/medical-history/{patient}', [PatientController::class, 'medHistory'])->name('patient.med-history');
    Route::post('patient/medical-store/{app}', [PatientController::class, 'storeMedToTake'])->name('patient.med-store');

    Route::get('medicine-list', [MedicineListController::class, 'index'])->name('med-list.index');
    Route::post('medicine-list/store', [MedicineListController::class, 'store'])->name('med-list.store');
    Route::post('medicine-list/update/{id}', [MedicineListController::class, 'update'])->name('med-list.update');
    Route::delete('medicine-list/delete/{id}', [MedicineListController::class, 'destroy'])->name('med-list.delete');


    Route::resource('medical', MedicalController::class)->only(['show']);

    Route::get('print_pdf/{id}', [MedicalController::class, 'MedicalPDF'])->name('pdf.index');

    Route::get('schedule', [BusinessHourController::class, 'BusinessHour'])->name('appointment.appointment_hours');
    Route::post('schedule/update', [BusinessHourController::class, 'BusinessHourUpdate'])->name('appointment_hours.update');
    Route::delete('schedule/delete/{hour}', [BusinessHourController::class, 'destroy'])->name('appointment_hours.destroy');

    Route::get('walkin/create-patient', [WalkinController::class, 'createPatient'])->name('walkin.create-patient');
    Route::post('walkin/create-patient', [WalkinController::class, 'store'])->name('walkin.store-patient');
    Route::get('walkin', [WalkinController::class, 'walkins'])->name('walkin.index');
});
