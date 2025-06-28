@extends('admin.layout.app') {{-- Atau sesuaikan layout kamu --}}

@section('content')
    <div class="container">
        <h2>Data Mahasiswa</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="GET" action="{{ route('mahasiswa.index') }}" class="mb-4">
                    <div class="flex items-center gap-2">
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="w-full md:w-64 px-4 py-2 border rounded shadow-sm focus:ring focus:ring-blue-200"
                            placeholder="🔍 Cari nama, NIP, atau email...">
                        <button type="submit" class="btn btn-primary">
                            Cari
                        </button>
                        @if (request('search'))
                            <a href="{{ route('mahasiswa.index') }}" class="text-sm text-red-500 underline">Reset</a>
                        @endif
                    </div>
                </form>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Dosen Pembimbing</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswas as $m)
                            <tr class="align-middle">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td>{{ $m->nama }}</td>
                                <td>{{ $m->nim }}</td>
                                <td>{{ $m->email }}</td>
                                <td>{{ $m->alamat }}</td>
                                <td>{{ $m->dosen->nama ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $mahasiswas->links() }}
                </div>
                <p class="text-sm text-gray-500 mt-2">
                    Menampilkan {{ $mahasiswas->firstItem() }} sampai {{ $mahasiswas->lastItem() }} dari total
                    {{ $mahasiswas->total() }} data.
                </p>

            </div>
        </div>
    </div>
@endsection
