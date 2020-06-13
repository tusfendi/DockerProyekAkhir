@extends('layouts.global')
{{-- @extends('components.notifikasi') --}}

@section('title')
    Kelompok Pegawai
@endsection

@section('content')
    <div class="container">
        <div style="margin-bottom:7%">
            <h3 class="text-center">Kelompok Pegawai</h3>
            <a href="{{url("kelompok_pegawai/create")}}" class="btn btn-primary  float-right">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>

        @include('components.notifikasi')

        {{-- isi konten --}}
        <div class="container">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kelompok Pegawai</th>
                    <th scope="col">Pilihan</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($kelompok_pegawais as $iteration => $kelompok_pegawai)
                    <tr>
                        <td>{{$iteration+1}}</td>
                        <td>{{$kelompok_pegawai->nama_kelompok_pegawai}} </td>
                        <td>
                            <form action="{{url("kelompok_pegawai/{$kelompok_pegawai->id_kelompok_pegawai}")}}" method="post">
                                <a href="{{url("kelompok_pegawai/{$kelompok_pegawai->id_kelompok_pegawai}/edit")}}" class="btn btn-outline-secondary btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-outline-danger btn-sm" title="Hapus Permanen" onclick="return confirm('Hapus permanen data ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $kelompok_pegawais->links() }}
        </div>
    </div>
@endsection

