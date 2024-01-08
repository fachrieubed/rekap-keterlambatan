<?php

namespace App\Http\Controllers;

use App\Models\Late;
use App\Models\User;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('ps')) {
            $rayon = $user->rayon;
            $students = Student::where('rayon_id', $rayon->id)->get();
            $latesCount = Late::where('date_time_late', '>=', now()->startOfDay())
                ->where('date_time_late', '<=', now()->endOfDay())
                ->whereIn('name', $students->pluck('name'))
                ->count();
        } else {
            $students = Student::all();
            $latesCount = Late::whereDate('date_time_late', now())->count();
        }

        $rombels = Rombel::all();
        $rayons = Rayon::all();
        $users = User::all();
        $adminCount = User::where('role', 'admin')->count();
        $psCount = User::where('role', 'ps')->count();

        return view('home', compact('rombels', 'students', 'rayons', 'latesCount', 'users', 'adminCount', 'psCount'));
    }

    public function pembimbingSiswaDashboard()
    {
        return view('index');
    }

    public function administratorDashboard()
    {
        return view('welcome');
    }
}
