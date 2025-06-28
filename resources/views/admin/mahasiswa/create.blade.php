@extends('admin.layout.app')

@section('content')
    <div class="container">
        <h2>Tambah Mahasiswa</h2>
        <form method="POST" action="{{ route('mahasiswa.store') }}">
            @csrf
            <input class="form-control mb-2" name="nama" placeholder="Nama" required>
            <input class="form-control mb-2" name="nim" placeholder="NIM" required>
            <input class="form-control mb-2" name="email" type="email" placeholder="Email" required>
            <textarea class="form-control mb-2" name="alamat" placeholder="Alamat" required></textarea>

            <select name="dosen_id" class="form-control mb-2" required>
                <option value="">-- Pilih Dosen Pembimbing --</option>
                @foreach ($dosens as $dosen)
                    <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                @endforeach
            </select>
            <button class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
