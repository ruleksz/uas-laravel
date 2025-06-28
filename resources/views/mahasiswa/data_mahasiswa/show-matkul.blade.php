@extends('mahasiswa.layouts.app')

@section('content')
    <div class="p-2">
        <div class="w-full mx-auto mt-10 bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
            <div class="grid grid-cols-2">
                <h1 class="text-3xl font-bold text-blue-700 mb-6 border-b pb-3">Detail Mahasiswa</h1>
                <h1 class="text-3xl font-bold text-blue-700 mb-6 border-b pb-3">Matakuliah</h1>
            </div>
            <div class="grid grid-cols-2">
                <div class="mb-6">
                    <p class="text-lg text-gray-600"><span class="font-semibold text-gray-800">Nama:</span> {{ $mahasiswa->nama }}</p>
                    <p class="text-lg text-gray-600"><span class="font-semibold text-gray-800">NIM:</span> {{ $mahasiswa->nim }}</p>
                    <p class="text-lg text-gray-600"><span class="font-semibold text-gray-800">Email:</span> {{ $mahasiswa->email }}
                    </p>
                    <p class="text-gray-600"><span class="font-semibold text-gray-800">Alamat:</span>
                        {{ $mahasiswa->alamat }}
                    </p>
                    <p class="text-gray-600"><span class="font-semibold text-gray-800">Dosen Pembimbing:</span>
                        {{ $mahasiswa->dosen->nama ?? '-' }}</p>
                </div>

                <div class="mb-4">
                    @if ($mahasiswa->matakuliahs->isNotEmpty())
                        <ul class="list-decimal list-inside space-y-1">
                            @foreach ($mahasiswa->matakuliahs as $mk)
                                <li class="text-gray-800 font-semibold text-lg"><span class="text-gray-600 font-medium">{{ $mk->nama }}</span></li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500 italic">Belum ada matakuliah yang ditambahkan.</p>
                    @endif
                </div>
            </div>



            <div class="mt-6">
                <a href="{{ route('mahasiswa.mahasiswa.index') }}" class="text-sm text-blue-600 hover:underline">&larr;
                    Kembali ke daftar</a>
            </div>
        </div>
    </div>

@endsection
