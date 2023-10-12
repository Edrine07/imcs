<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{



    // Dashboard
    public function AdminDashboard ()
    {
        notify()->success('Welcome to Immaculate Clinic');
        return view ('admin.dashboard', [
            'appointments' => Appointment::count(),
            'patients' => Patient::count(),
        ]);
    }

    // Login
    public function AdminLogin ()
    {
        return view ('admin.login');
    }

    // Logout
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    // Admin Profile
    public function AdminProfile ()
    {
        $id = Auth::user()->id;
        $ProfileData = User::find($id);
        return view ('admin.profile', compact('ProfileData'));
    }

}
