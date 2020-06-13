@extends('layouts.global')

@section('title')
   Tambah Kelompok Pegawai
@endsection

@section('content')
    <div class="container">
        <h3 class="text-center">Tambah Kelompok Pegawai</h3>
    </div>
    <hr>
    <br>
    @include('components.notifikasi')
    {{-- isi konten --}}
        <div class="container">
            <form action="{{route('kelompok_pegawai.store')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-2 col-form-label">Kelompok Pegawai</label>
                    <div class="col-5">
                      <input type="text" class="form-control" name="nama_kelompok_pegawai" placeholder="Kelompok Pegawai" value="{{Request::input("nama_kelompok_pegawai")}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label"></label>
                    <div class="col-5">
                        <button type="submit" class="btn btn-sm btn-primary mb-2">Simpan</button>
                        <a href="{{route('kelompok_pegawai.index')}}" class="btn btn-sm btn-danger mb-2">kembali</a>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
@endsection

