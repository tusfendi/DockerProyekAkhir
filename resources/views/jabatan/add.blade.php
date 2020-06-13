@extends('layouts.global')

@section('title')
   Tambah Jabatan
@endsection

@section('content')
    <div class="container">
        <h3 class="text-center">Tambah Jabatan</h3>
    </div>
    <hr>
    <br>
    @include('components.notifikasi')
    {{-- isi konten --}}
        <div class="container">
            <form action="{{route('jabatan.store')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-1 col-form-label">Jabatan</label>
                    <div class="col-5">
                      <input type="text" class="form-control" name="nama_jabatan" placeholder="Jabatan" value="{{Request::input("jabatan")}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 col-form-label"></label>
                    <div class="col-5">
                        <button type="submit" class="btn btn-sm btn-primary mb-2">Simpan</button>
                        <a href="{{route('jabatan.index')}}" class="btn btn-sm btn-danger mb-2">kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

