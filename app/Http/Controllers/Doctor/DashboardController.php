<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $pw_matches = false;
        if (Hash::check(Auth::user()->username, Auth::user()->password)){
            $pw_matches = true;
        }

        return view('doctor.dashboard')
        ->with('pw_matches', $pw_matches);
    }
}
