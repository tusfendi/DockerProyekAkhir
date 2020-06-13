@extends('layouts.global')

@section('title')
   Edit Pekerjaan
@endsection

@section('content')
    <div class="container">
        <h3 class="text-center">Edit Detail Pekerjaan</h3>
    </div>
    <hr>
    <br>
    @include('components.notifikasi')
    {{-- isi konten --}}
        <div class="container">
            <form action="{{route('pekerjaan-meta.update',[$pekerjaan->id_meta])}}" method="POST">
                {{ method_field('PUT') }}
                @csrf
                <div class="form-group row">
                    <label class="col-1 col-form-label">Pekerjaan</label>
                    <div class="col-5">
                        <input type="text" class="form-control" name="nama_meta" placeholder="pekerjaan" value="{{$pekerjaan->nama_meta}}">
                        <input type="hidden" class="form-control" name="id_pekerjaan" value="{{$pekerjaan->id_pekerjaan}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-1 col-form-label"></label>
                    <div class="col-5">
                        <button type="submit" class="btn btn-sm btn-primary mb-2">Simpan</button>
                        <a href="{{url('pekerjaan/'.$pekerjaan->id_pekerjaan)}}" class="btn btn-sm btn-danger mb-2">kembali</a>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
@endsection

