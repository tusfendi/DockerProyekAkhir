@extends('layouts.global')

@section('title')
    Beranda
@endsection

@section('content')
    <div class="text-center">
        <h3>Beranda</h3>
    </div>
    <div class="container">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    {{-- isi konten --}}
    </div>
@endsection
