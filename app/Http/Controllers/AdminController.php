<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index() {
        return view('admin.index');
    }
    function admin() {
        return view('admin.index');
    }
    function dosen() {
        return view('dosen.index');
    }
    function mahasiswa() {
        return view('mahasiswa.index');
    }
}
