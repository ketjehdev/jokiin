<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // index 
    public function index()
    {
        $datas = [
            'users' => User::paginate(5),
            'total_user' => User::count(),
            'total_penjoki' => User::where('role', '=', 'penjoki')->count(),
            'total_pelajar' => User::where('role', '=', 'pelajar')->count(),
        ];
        return view('admin.dash', $datas);
    }
}
