@extends('admin.layout.app') {{-- Atau sesuaikan layout kamu --}}

@section('content')
    <div class="container">
        <h2>Data Dosen</h2>
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
                <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah Dosen</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="GET" action="{{ route('dosen.index') }}" class="mb-4">
                    <div class="flex items-center gap-2">
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="w-full md:w-64 px-4 py-2 border rounded shadow-sm focus:ring focus:ring-blue-200"
                            placeholder="🔍 Cari nama, NIP, atau email...">
                        <button type="submit" class="btn btn-primary">
                            Cari
                        </button>
                        @if (request('search'))
                            <a href="{{ route('dosen.index') }}" class="text-sm text-red-500 underline">Reset</a>
                        @endif
                    </div>
                </form>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama</th>
                            <th>Nip</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosens as $dosen)
                            <tr class="align-middle">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td>{{ $dosen->nama }}</td>
                                <td>{{ $dosen->nip }}</td>
                                <td>{{ $dosen->email }}</td>
                                <td>{{ $dosen->alamat }}</td>
                                <td>
                                    <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin hapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $dosens->links() }}
                </div>
                <p class="text-sm text-gray-500 mt-2">
                    Menampilkan {{ $dosens->firstItem() }} sampai {{ $dosens->lastItem() }} dari total
                    {{ $dosens->total() }} data.
                </p>

            </div>
        </div>
    </div>
@endsection
