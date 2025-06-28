@extends('admin.layout.app')

@section('content')
<div class="container">
    <h2>Tambah Dosen</h2>
    <form action="{{ route('dosen.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label>NIP</label>
            <input name="nip" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input name="email" type="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <button class="btn btn-success mt-2">Simpan</button>
    </form>
</div>
@endsection
