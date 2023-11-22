<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{

    public function adminDashboard()
    {
        notify()->success('Welcome to Immaculate Clinic');

        $completedAppointments = Appointment::where('appointment_status', 'Completed')->whereYear('appointment_date', date('Y'))->get();

        $appointmentsCountByMonth = [
            'January' => 0,
            'February' => 0,
            'March' => 0,
            'April' => 0,
            'May' => 0,
            'June' => 0,
            'July' => 0,
            'August' => 0,
            'September' => 0,
            'October' => 0,
            'November' => 0,
            'December' => 0,
        ];

        $appointmentsCountByMonthWalkIn = [
            'January' => 0,
            'February' => 0,
            'March' => 0,
            'April' => 0,
            'May' => 0,
            'June' => 0,
            'July' => 0,
            'August' => 0,
            'September' => 0,
            'October' => 0,
            'November' => 0,
            'December' => 0,
        ];

        foreach ($completedAppointments as $appointment) {
            // Check if appointment_type is equal to "Appointment"
            if ($appointment->appointment_type == 'Appointment') {
                $month = Carbon::parse($appointment->appointment_date)->format('F');
                $appointmentsCountByMonth[$month]++;
            }
        }

        foreach ($completedAppointments as $appointment) {
            // Check if appointment_type is equal to "Walk-in"
            if ($appointment->appointment_type == 'Walk-in') {
                $month = Carbon::parse($appointment->appointment_date)->format('F');
                $appointmentsCountByMonthWalkIn[$month]++;
            }
        }
        // dd($appointmentsCountByMonth);


        $appointments = Appointment::count();
        $patients = Patient::count();
        $todayAppointments = Appointment::where('appointment_date', '=', date('Y-m-d'))
            ->where('appointment_status', '=', 'Approved')
            ->count();


        // get all pending appointments equal or greater than today
        $pendingAppointments = Appointment::where('appointment_date', '>=', date('Y-m-d'))->where('appointment_status', '=', 'Pending')->orderBy('appointment_date', 'asc')->orderBy('appointment_time', 'asc')->paginate(5);


        // dd($appointments);

        return view('admin.dashboard', compact('appointments', 'patients', 'todayAppointments', 'pendingAppointments', 'appointmentsCountByMonth', 'appointmentsCountByMonthWalkIn'));
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
