@extends('dosen.layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
        <h1 class="text-3xl font-bold text-blue-700 mb-6 border-b pb-2">Edit Relasi Mahasiswa</h1>

        <div class="mb-6">
            <p class="text-gray-600">Mahasiswa: <span class="font-semibold text-gray-800">{{ $mahasiswa->nama }}</span></p>
            <p class="text-gray-600">NIM: <span class="text-gray-800">{{ $mahasiswa->nim }}</span></p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 border border-red-300">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('relasi.update', $mahasiswa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block text-lg font-medium text-gray-700 mb-2">Pilih Mata Kuliah</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach ($matakuliahs as $mk)
                        <label class="flex items-center bg-gray-50 border rounded-lg px-4 py-2 hover:bg-blue-50 transition">
                            <input type="checkbox" name="matakuliahs[]" value="{{ $mk->id }}"
                                class="mr-3 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                {{ $mahasiswa->matakuliahs->contains($mk->id) ? 'checked' : '' }}>
                            <span class="text-sm text-gray-700">{{ $mk->nama }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="mt-8 flex justify-between">
                <a href="{{ route('relasi.index') }}"
                    class="text-sm text-gray-600 hover:text-gray-800 hover:underline transition">← Kembali</a>

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded-lg transition duration-200 shadow">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
