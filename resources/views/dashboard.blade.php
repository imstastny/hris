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
            <div class="col-sm-4">
                <a href="/rekap/cuti">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-table"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <h5><span class="info-box-text">Rekap Data Cuti Karyawan</span></h5>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>

                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            <div class="col-sm-4">
                <a href="/rekap/izin">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fas fa-clock"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text"></span>
                            <h5><span class="info-box-text">Rekap Data Izin Karyawan</span></h5>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>

                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            <div class="col-sm-4">
                <a href="{{route('kelola.index')}}">
                    <div class="info-box bg-danger">
                        <span class="info-box-icon"><i class="fas fa-user"></i></span>

                        <div class="info-box-content">
                            <h5> <span class="info-box-text">Kelola Data Karyawan</span> </h5>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>

                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
        </div>

    </div>
</div>
@endsection