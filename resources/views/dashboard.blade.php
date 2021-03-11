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
                    <a href="/rekap/cuti" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                    <a href="/rekap/izin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                    <a href="{{route('kelola.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                <tr>
                                    <td>Nama</td>
                                    <td>NIK</td>
                                    <td>Divisi</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection