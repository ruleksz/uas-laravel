@extends('admin.layout.app')

@section('content')
    <div class="container">
        <h2>Tambah Matakuliah</h2>
        <form method="POST"
            action="{{ isset($matakuliah) ? route('matakuliah.update', $matakuliah) : route('matakuliah.store') }}">
            @csrf
            @if (isset($matakuliah))
                @method('PUT')
            @endif
            <input class="form-control mb-2" name="kode" value="{{ old('kode', $matakuliah->kode ?? '') }}"
                placeholder="Kode" required>
            <input class="form-control mb-2" name="nama" value="{{ old('nama', $matakuliah->nama ?? '') }}"
                placeholder="Nama Matakuliah" required>
            <button type="submit" class="mt-3 bg-blue-600 text-white px-4 py-2 rounded">
                {{ isset($matakuliah) ? 'Update' : 'Simpan' }}
            </button>
        </form>
    </div>
@endsection
