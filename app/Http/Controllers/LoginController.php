<?php

namespace App\Http\Controllers;

use App\Service\Database\UserService;
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
            $user = Auth::user();

            if ($user->role === 'SUPERADMIN') {
                return redirect('dashboard');
            }

            return redirect( strtolower($user->role) . '/dashboard');
        }
        return redirect('login')->with('error', true);
    }

    public function logout(){
        Auth::logout();

        return redirect('/login');
    }

    public function resetPassword(Request $request) {
        $DBuser = new UserService;

        $userId = $request->user_id;
        $password = $request->password;

        $payload = [
            'password' => $password,
        ];

        $DBuser->update($userId, $payload);

        if (Auth::user()->role === 'SUPERADMIN') {
            return redirect('dashboard');
        }

        return redirect( strtolower(Auth::user()->role) . '/dashboard');
    }
}
