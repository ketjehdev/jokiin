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

    // user management
    public function user_manage()
    {
        $data = User::all();

        return view('admin.users', compact('data'));
    }

    public function tambah_penjoki(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->username = $request->username;
        $user->role = 'penjoki';
        $user->bidang = $request->bidang;
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect('adminUser')->with('success', 'Penjoki berhasil ditambahkan!');
    }

    public function del_user($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/adminUser')->with('warning', 'User berhasil di hapus');
    }
}
