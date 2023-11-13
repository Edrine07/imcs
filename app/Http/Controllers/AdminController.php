<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{



    // Dashboard
    public function adminDashboard()
    {
        notify()->success('Welcome to Immaculate Clinic');

        $appointments = Appointment::count();
        $patients = Patient::count();
        $todayAppointments = Appointment::where('appointment_date', '=', date('Y-m-d'))
            ->where('appointment_status', '=', 'Approved')
            ->count();

        $pendingAppointments = Appointment::where('appointment_status', '=', 'Pending')
            ->where('appointment_date', '=', date('Y-m-d'))
            ->orderBy('appointment_time', 'asc')
            ->get();


        // dd($appointments);

        return view('admin.dashboard', compact('appointments', 'patients', 'todayAppointments', 'pendingAppointments'));
    }

    // Login
    public function adminLogin()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($attributes, $remember)) {
            session()->regenerate();
            return redirect()->route('admin.dashboard')->with(['success' => 'You are logged in.']);
        } else {

            return back()->withErrors(['email' => 'Email or password invalid.']);
        }
    }

    // Logout
    public function adminLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if (Auth::viaRemember()) {
            return redirect('/admin/login')->withCookie(Cookie::forget('remember_web_' . env('APP_NAME')));
        }

        return redirect('/admin/login');
    }

    // Admin Profile
    public function adminProfile()
    {
        $id = Auth::user()->id;
        $ProfileData = User::find($id);
        return view('admin.profile', compact('ProfileData'));
    }
}
