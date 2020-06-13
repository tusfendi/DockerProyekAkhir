@extends('layouts.global')
{{-- @extends('components.notifikasi') --}}

@section('title')
    Jabatan
@endsection

@section('content')
    <div class="container">
        <div style="margin-bottom:7%">
            <h3 class="text-center">Jabatan</h3>
            <a href="{{url("jabatan/create")}}" class="btn btn-primary  float-right">
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
                    <th scope="col">Jabatan</th>
                    <th scope="col">Pilihan</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($jabatans as $iteration => $jabatan)
                    <tr>
                        <td>{{$iteration+1}}</td>
                        <td>{{$jabatan->nama_jabatan}} </td>
                        <td>
                            <form action="{{url("jabatan/{$jabatan->id_jabatan}")}}" method="post">
                                <a href="{{url("jabatan/{$jabatan->id_jabatan}/edit")}}" class="btn btn-outline-secondary btn-sm" title="Edit">
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
            {{ $jabatans->links() }}
        </div>
    </div>
@endsection

