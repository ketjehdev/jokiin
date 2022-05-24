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

            if (auth()->user()->role == "admin") {
                return redirect()->route('adminDash');
            } else if (auth()->user()->role = "penjoki") {
                return redirect()->route('penjokiDash');
            } else {
                return redirect()->route('userDash');
            }
        }

        return back()->with('loginError', 'Login Failed!');
    }

    // daftar auth
    public function daftar_authenticate(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'name.required' => 'Kolom nama gak boleh kosong!',
                'username.required' => 'Kolom username gak boleh kosong!',
                'password.required' => 'Kolom password gak boleh kosong!',
            ]
        );

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('login');
    }

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
