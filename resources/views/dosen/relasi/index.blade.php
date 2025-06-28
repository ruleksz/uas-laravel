@extends('dosen.layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Daftar Relasi Mahasiswa & Mata Kuliah</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('relasi.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4">
            + Tambah Relasi
        </a>

        <table class="min-w-full bg-white border border-gray-200 mt-4">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Mahasiswa</th>
                    <th class="border px-4 py-2">Mata Kuliah</th>
                    <th class="border px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($mahasiswas as $mhs)
                    @if ($mhs->matakuliahs->isNotEmpty())
                        <tr>
                            <td class="border px-4 py-2">{{ $no++ }}</td>
                            <td class="border px-4 py-2">{{ $mhs->nama }}</td>
                            <td class="border px-4 py-2">
                                <ul class="list-inside">
                                    @foreach ($mhs->matakuliahs as $mk)
                                        <li class="flex justify-between">
                                            <span>{{ $loop->iteration }}. {{ $mk->nama }}</span>
                                            <form action="{{ route('relasi.destroy', [$mhs->id, $mk->id]) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus relasi ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:underline text-sm ml-2">Hapus</button>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>

                            </td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('relasi.edit', $mhs->id) }}"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
