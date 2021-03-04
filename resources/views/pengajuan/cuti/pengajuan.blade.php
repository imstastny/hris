@extends('layouts.main')
@section('content')
<div class="content-header px-3">
    <h4> Daftar Pengajuan Cuti</h4>
</div>
<br>
<section class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{route('cuti.formulir') }}" class="btn btn-info">
                    <i class="fas fa-plus-square"></i>
                    Ajukan Permohonan Cuti</a>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Permohonan Cuti Divisi</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Jumlah Hari</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cutis as $cuti)
                                <tr>
                                    <td>{{$cuti->slug}}</td>
                                    <td>Alexander Pierce</td>
                                    <td>{{$cuti->tgl_mulai}}</td>
                                    <td>{{$cuti->tgl_selesai}}</td>
                                    <td>{{$cuti->jml_hari}}</td>
                                    <td>
                                        <a href="/cuti/pengajuan/{{$cuti->slug}}" class="btn btn-info">detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

@endsection