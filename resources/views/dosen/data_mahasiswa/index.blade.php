@extends('dosen.layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Data Mahasiswa</h2>

<table class="table-auto w-full">
    <thead>
        <tr>
            <th class="border px-4 py-2">#</th>
            <th class="border px-4 py-2">Nama</th>
            <th class="border px-4 py-2">NIM</th>
            <th class="border px-4 py-2">Email</th>
            <th class="border px-4 py-2">Dosen Pembimbing</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswas as $index => $mhs)
            <tr>
                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                <td class="border px-4 py-2">{{ $mhs->nama }}</td>
                <td class="border px-4 py-2">{{ $mhs->nim }}</td>
                <td class="border px-4 py-2">{{ $mhs->email }}</td>
                <td class="border px-4 py-2">{{ $mhs->dosen->nama ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
