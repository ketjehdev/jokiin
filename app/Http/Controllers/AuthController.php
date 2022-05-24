<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // login auth
    public function login_authenticate(Request $request)
    {
        $credential = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Kolom username gak boleh kosong!',
            'password.required' => 'Kolom password gak boleh kosong!',
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();

            if (auth()->user()->role = "admin") {
                return view('admin.dashboard');
            }
        }

        return back()->with('loginError', 'Login Failed!');
    }

    // daftar auth
    public function daftar_authenticate()
    {
        User::create();
    }

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
