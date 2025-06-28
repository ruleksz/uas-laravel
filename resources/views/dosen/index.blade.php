@extends('dosen.layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <p>Selamat datang {{ auth()->user()->name }}</p>
@endsection
