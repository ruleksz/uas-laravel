@extends('dosen.layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
        <h1 class="text-3xl font-bold text-blue-700 mb-6 border-b pb-3">Tambah Relasi Mahasiswa & Mata Kuliah</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-6 border border-red-300">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('relasi.store') }}" method="POST">
            @csrf

            {{-- Mahasiswa Dropdown --}}
            <div class="mb-6">
                <label for="mahasiswa_id" class="block text-lg font-medium text-gray-700 mb-2">Pilih Mahasiswa</label>
                <select name="mahasiswa_id" id="mahasiswa_id" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Mahasiswa --</option>
                    @foreach ($mahasiswas as $mhs)
                        <option value="{{ $mhs->id }}">{{ $mhs->nama }} - {{ $mhs->nim }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Matakuliah Checklist --}}
            <div class="mb-6">
                <label class="block text-lg font-medium text-gray-700 mb-2">Pilih Mata Kuliah</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach ($matakuliahs as $mk)
                        <label class="flex items-center bg-gray-50 border rounded-lg px-4 py-2 hover:bg-blue-50 transition">
                            <input type="checkbox" name="matakuliahs[]" value="{{ $mk->id }}"
                                class="mr-3 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="text-sm text-gray-700">{{ $mk->nama }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- Submit Button --}}
            <div class="mt-8 flex justify-between items-center">
                <a href="{{ route('relasi.index') }}"
                    class="text-sm text-gray-600 hover:underline hover:text-gray-900 transition">← Kembali</a>

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition duration-200">
                    Simpan Relasi
                </button>
            </div>
        </form>
    </div>
@endsection
