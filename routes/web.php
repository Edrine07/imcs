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
        Route::post('/store', 'reserveAppointmentStore')->name('appointment.reserve_appointment');
        Route::get('/find-patient', 'findPatient')->name('appointment.find');
        Route::post('/appointment/patient-find-store/{patient}', 'findPatient')->name('appointment.findPatient');
        Route::get('/appointment', 'appoint')->name('appointment.appointment');
    });

    Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
    Route::post('/admin/session', [AdminController::class, 'store'])->name('admin.session');
});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    // Route::post('/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

    Route::get('/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');

    Route::resource('prescription', PrescriptionController::class);
    Route::resource('appointment', AppointmentController::class)->except(['show']);
    Route::get('appointment/approve/{appointment}', [AppointmentController::class, 'approve'])->name('appointment.approve');
    Route::get('appointment/cancel/{appointment}', [AppointmentController::class, 'cancel'])->name('appointment.cancel');

    Route::resource('checkup', TodayCheckupController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
    Route::get('checkup/consult/{appointment}', [TodayCheckupController::class, 'consult'])->name('checkup.consult');
    Route::post('checkup/consult-store/{appointment}', [TodayCheckupController::class, 'storeConsult'])->name('checkup.store-consult');

    Route::resource('patient', PatientController::class)->except(['show']);
    Route::get('patient/medical-history/{patient}', [PatientController::class, 'medHistory'])->name('patient.med-history');
    Route::post('patient/medical-store/{app}', [PatientController::class, 'storeMedToTake'])->name('patient.med-store');

    Route::resource('med-list', MedicineListController::class)->except(['show']);
    Route::resource('medical', MedicalController::class)->only(['show']);

    Route::get('print_pdf/{id}', [MedicalController::class, 'MedicalPDF'])->name('pdf.index');

    Route::get('schedule', [BusinessHourController::class, 'BusinessHour'])->name('appointment.appointment_hours');
    Route::post('schedule/update', [BusinessHourController::class, 'BusinessHourUpdate'])->name('appointment_hours.update');

    Route::get('walkin/create-patient', [WalkinController::class, 'createPatient'])->name('walkin.create-patient');
    Route::post('walkin/create-patient', [WalkinController::class, 'store'])->name('walkin.store-patient');
});
