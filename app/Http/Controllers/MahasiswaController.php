<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Mahasiswa::with('dosen')->orderBy('nama');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nim', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $mahasiswas = $query->paginate(10)->withQueryString();

        return view('admin.mahasiswa.index', compact('mahasiswas'));
    }


    public function create()
    {
        $dosens = Dosen::all();
        return view('admin.mahasiswa.create', compact('dosens'));
    }
    // public function show()
    // {
    //     $mahasiswas = Mahasiswa::with('dosen')->get();
    //     return view('dosen.data_mahasiswa.index', compact('mahasiswas'));
    // }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas',
            'email' => 'required|email|unique:mahasiswas',
            'alamat' => 'required',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $dosens = Dosen::all();
        return view('admin.mahasiswa.edit', compact('mahasiswa', 'dosens'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
            'alamat' => 'required',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
