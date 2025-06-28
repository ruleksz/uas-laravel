@extends('admin.layout.app')

@section('content')
<div class="container">
    <h2>Edit Dosen</h2>
    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Nama</label>
            <input name="nama" class="form-control" value="{{ $dosen->nama }}" required>
        </div>
        <div class="form-group">
            <label>NIP</label>
            <input name="nip" class="form-control" value="{{ $dosen->nip }}" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input name="email" type="email" class="form-control" value="{{ $dosen->email }}" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ $dosen->alamat }}</textarea>
        </div>
        <button class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection
