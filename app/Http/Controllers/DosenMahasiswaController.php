<?php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;

class DosenMahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('dosen')->get(); // atau 'matakuliahs' kalau mau
        return view('dosen.data_mahasiswa.index', compact('mahasiswas'));
    }
}
