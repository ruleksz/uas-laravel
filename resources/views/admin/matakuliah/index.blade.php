@extends('admin.layout.app') {{-- Atau sesuaikan layout kamu --}}

@section('content')
    <div class="container">
        <h2>Data Matakuliah</h2>
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
                <a href="{{ route('matakuliah.create') }}" class="btn btn-primary">Tambah Matakuliah</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="GET" action="{{ route('matakuliah.index') }}" class="mb-4">
                    <div class="flex items-center gap-2">
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="w-full md:w-64 px-4 py-2 border rounded shadow-sm focus:ring focus:ring-blue-200"
                            placeholder="🔍 Cari nama matakuliah...">
                        <button type="submit" class="btn btn-primary">
                            Cari
                        </button>
                        @if (request('search'))
                            <a href="{{ route('matakuliah.index') }}" class="text-sm text-red-500 underline">Reset</a>
                        @endif
                    </div>
                </form>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Kode</th>
                            <th>Nama Matakuliah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matakuliahs as $index => $mk)
                            <tr class="border-t">
                                <td class="px-4 py-2">
                                    {{ $loop->iteration + ($matakuliahs->currentPage() - 1) * $matakuliahs->perPage() }}
                                </td>
                                <td class="px-4 py-2">{{ $mk->kode }}</td>
                                <td class="px-4 py-2">{{ $mk->nama }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('matakuliah.edit', $mk) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('matakuliah.destroy', $mk) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Yakin ingin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $matakuliahs->links() }}
                </div>
                <p class="text-sm text-gray-500 mt-2">
                    Menampilkan {{ $matakuliahs->firstItem() }} sampai {{ $matakuliahs->lastItem() }} dari total
                    {{ $matakuliahs->total() }} data.
                </p>
            </div>
        </div>
    </div>
@endsection
