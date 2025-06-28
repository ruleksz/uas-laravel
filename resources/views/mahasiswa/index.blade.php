@extends('mahasiswa.layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">Dashboard</h1>
    <p>Selamat datang {{ auth()->user()->name }}</p>
@endsection
