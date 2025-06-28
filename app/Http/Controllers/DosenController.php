<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        $query = Dosen::withCount('mahasiswas')->orderBy('nama');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $dosens = $query->paginate(10)->withQueryString();

        return view('admin.dosen.index', compact('dosens'));
    }


    public function create()
    {
        return view('admin.dosen.create');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'nama'  => 'required',
                'nip'   => 'required|unique:dosens',
                'email' => 'required|email|unique:dosens',
                'alamat' => 'required',
            ]);

            Dosen::create($request->all());
            return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Ambil error pertama
            $errorMessage = collect($e->errors())->first()[0];

            return redirect()->route('dosen.index')->with('error', $errorMessage);
        }
    }


    public function edit(Dosen $dosen)
    {
        return view('admin.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:dosens,nip,' . $dosen->id,
            'email' => 'required|email|unique:dosens,email,' . $dosen->id,
            'alamat' => 'required',
        ]);

        $dosen->update($request->all());
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus.');
    }
}
