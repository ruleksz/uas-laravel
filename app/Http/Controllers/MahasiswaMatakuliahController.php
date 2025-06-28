<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MahasiswaMatakuliahController extends Controller
{
    // Menampilkan daftar mahasiswa beserta matakuliah yang direlasikan
    public function index()
    {
        $mahasiswas = Mahasiswa::with('matakuliahs')->orderBy('nama')->get();
        return view('dosen.relasi.index', compact('mahasiswas'));
    }

    // Form untuk menambahkan relasi
    public function create()
    {
        $mahasiswas = Mahasiswa::orderBy('nama')->get();
        $matakuliahs = Matakuliah::orderBy('nama')->get();

        return view('dosen.relasi.create', compact('mahasiswas', 'matakuliahs'));
    }

    // Menyimpan relasi baru
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'matakuliahs' => 'required|array',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($request->mahasiswa_id);
        $mahasiswa->matakuliahs()->syncWithoutDetaching($request->matakuliahs);

        return redirect()->route('relasi.index')->with('success', 'Relasi berhasil ditambahkan.');
    }

    // Menampilkan form edit relasi
    public function edit(Mahasiswa $mahasiswa)
    {
        $matakuliahs = Matakuliah::orderBy('nama')->get();
        return view('dosen.relasi.edit', compact('mahasiswa', 'matakuliahs'));
    }

    // Memperbarui relasi mahasiswa-matakuliah
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'matakuliahs' => 'required|array',
        ]);

        $mahasiswa->matakuliahs()->sync($request->matakuliahs);

        return redirect()->route('relasi.index')->with('success', 'Relasi berhasil diperbarui.');
    }

    // Menghapus relasi satu matakuliah dari mahasiswa
    public function destroy(Mahasiswa $mahasiswa, Matakuliah $matakuliah)
    {
        $mahasiswa->matakuliahs()->detach($matakuliah->id);
        return back()->with('success', 'Relasi matakuliah berhasil dihapus.');
    }
}
