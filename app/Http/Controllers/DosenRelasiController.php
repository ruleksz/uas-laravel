<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class DosenRelasiController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('matakuliahs')->get();
        return view('dosen.relasi.index', compact('mahasiswas'));
    }


    public function create()
    {
        $mahasiswas = Mahasiswa::all();         // 🔄 Ambil semua mahasiswa
        $matakuliahs = Matakuliah::all();       // 🔄 Ambil semua matakuliah

        return view('dosen.relasi.create', compact('mahasiswas', 'matakuliahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'matakuliahs' => 'required|array',
        ]);

        // ✅ Ambil mahasiswa tanpa filter dosen
        $mahasiswa = Mahasiswa::findOrFail($request->mahasiswa_id);

        // ✅ Simpan relasi (tanpa menghapus yang lama)
        $mahasiswa->matakuliahs()->syncWithoutDetaching($request->matakuliahs);

        return redirect()->route('dosen.relasi.index')->with('success', 'Relasi berhasil ditambahkan.');
    }
}
