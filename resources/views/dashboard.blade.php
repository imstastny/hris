@extends('layouts.main',['title' => 'Dashboard'])
@section('title','Dashboard')

@section('content')
<div class="card card-info col-sm-12 p-0">
    <div class="card-header">
        <h3 class="card-title">Dashboard</h3>
    </div>
</div>

<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$cuti}}</h3>
                        <p>Rekap Data Cuti Karyawan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('rekap.cuti', ['year' => now()->year])}}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col">
                <!-- small box -->
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h3>{{$izin}}</h3>
                        <p>Rekap Data Izin Karyawan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('rekap.izin', ['year' => now()->year])}}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>

            </div>
            @can('isAdmin')
            <div class="col">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$user}}</h3>
                        <p>Kelola Data Karyawan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('kelola.index')}}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>

            </div>
            @endcan

        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Daftar Karyawan Cuti Hari ini</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">

                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Divisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($isCuti as $is)
                                <tr>
                                    <td>{{$is->name}}</td>
                                    <td>{{$is->nik}}</td>
                                    <td>{{$is->nama}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Daftar Karyawan Izin Hari ini</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">

                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Divisi</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($isIzin as $isizin)
                                <tr>
                                    <td>{{$isizin->name}}</td>
                                    <td>{{$isizin->nik}}</td>
                                    <td>{{$isizin->nama}}</td>
                                    <td>{{$isizin->wkt_mulai}}.00 - {{$isizin->wkt_selesai}}.00</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection