@extends('mahasiswa.layouts.app')

@section('content')
    <div class="p-4">
        <h2 class="text-xl font-bold mb-4">Data Mahasiswa</h2>

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">NIM</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Matakuliah</th>
                    <th class="border px-4 py-2">Dosen Pembimbing</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($mahasiswas as $index => $mhs)
                    <tr>
                        <td class="border px-4 py-2">{{ $no++ }}</td>
                        <td class="border px-4 py-2">{{ $mhs->nama }}</td>
                        <td class="border px-4 py-2">{{ $mhs->nim }}</td>
                        <td class="border px-4 py-2">{{ $mhs->email }}</td>
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('mahasiswa.mahasiswa.show', $mhs->id) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">
                                View
                            </a>
                        </td>
                        <td class="border px-4 py-2">{{ $mhs->dosen->nama ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
