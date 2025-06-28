<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;

class MahasiswaDataController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with(['dosen', 'matakuliahs'])
            ->whereHas('matakuliahs') // hanya mahasiswa yang punya matakuliah
            ->get();

        return view('mahasiswa.data_mahasiswa.index', compact('mahasiswas'));
    }
    // public function show(Mahasiswa $mahasiswas)
    // {
    //     $matakuliahs = Matakuliah::orderBy('nama')->get();
    //     return view('mahasiswa.data_mahasiswa.index', compact('mahasiswa', 'matakuliahs'));
    // }

    public function show($id)
{
    $mahasiswa = Mahasiswa::with(['matakuliahs', 'dosen'])->findOrFail($id);
    return view('mahasiswa.data_mahasiswa.show-matkul', compact('mahasiswa'));
}

}
