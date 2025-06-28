<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index(Request $request)
    {
        $query = Matakuliah::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%");
        }

        $matakuliahs = $query->latest()->paginate(10)->withQueryString();

        return view('admin.matakuliah.index', compact('matakuliahs'));
    }

    public function create()
    {
        return view('admin.matakuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:matakuliahs,kode',
            'nama' => 'required|string|max:255',
        ]);

        Matakuliah::create($request->all());
        return redirect()->route('matakuliah.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Matakuliah $matakuliah)
    {
        return view('admin.matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, Matakuliah $matakuliah)
    {
        $request->validate([
            'kode' => 'required|unique:matakuliahs,kode,' . $matakuliah->id,
            'nama' => 'required|string|max:255',
        ]);

        $matakuliah->update($request->all());
        return redirect()->route('matakuliah.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
