<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function check(Request $request){
        if (! Auth::check() && $request->is('login')) {
            return redirect('home');
        } elseif (! Auth::check()) {
            return redirect('home');
        }

        return redirect('dashboard');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(($credentials + ['status' => true]))){
            return redirect('dashboard');
        }

        return redirect('login')->with('error', true);
    }

    public function logout(){
        Auth::logout();

        return redirect('/login');
    }
}
