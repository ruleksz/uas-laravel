<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infoLogin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('admin/admin');
            } elseif (Auth::user()->role == 'dosen') {
                return redirect('admin/dosen');
            } elseif (Auth::user()->role == 'mahasiswa') {
                return redirect('admin/mahasiswa');
            }
        } else {
            return redirect('')->withErrors('Username atau Password salah')->withInput();
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
