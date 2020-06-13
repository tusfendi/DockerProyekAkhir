@extends('layouts.global')

@section('title')
   Edit Pekerjaan
@endsection

@section('content')
    <div class="container">
        <h3 class="text-center">Edit Pekerjaan</h3>
    </div>
    <hr>
    <br>
    @include('components.notifikasi')
    {{-- isi konten --}}
        <div class="container">
            <form action="{{route('pekerjaan.update',[$pekerjaan->id_pekerjaan])}}" method="POST">
                {{ method_field('PUT') }}
                @csrf
                <div class="form-group row">
                    <label class="col-1 col-form-label">Pekerjaan</label>
                    <div class="col-5">
                        <input type="text" class="form-control" name="nama_pekerjaan" placeholder="pekerjaan" value="{{$pekerjaan->nama_pekerjaan}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 col-form-label"></label>
                    <div class="col-5">
                        <button type="submit" class="btn btn-sm btn-primary mb-2">Simpan</button>
                        <a href="{{route('pekerjaan.index')}}" class="btn btn-sm btn-danger mb-2">kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

