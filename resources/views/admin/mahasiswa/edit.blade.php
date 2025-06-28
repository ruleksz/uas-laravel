@extends('admin.layout.app')

@section('content')
    <div class="container">
        <h2>Edit Mahasiswa</h2>
        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group">
                <label>Nama</label>
                <input name="nama" class="form-control" value="{{ $mahasiswa->nama }}" required>
            </div>
            <div class="form-group">
                <label>NIM</label>
                <input name="nim" class="form-control" value="{{ $mahasiswa->nim }}" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control" value="{{ $mahasiswa->email }}" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ $mahasiswa->alamat }}</textarea>
            </div>
            <div class="form-group">
                <label>Dosen Pembimbing</label>
                <select name="dosen_id" class="form-control mb-2" required>
                    @foreach ($dosens as $dosen)
                        <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary mt-2">Update</button>
        </form>
    </div>
@endsection
