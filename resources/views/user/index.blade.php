@extends('layouts.main',['title' => 'Rekap Pengajuan Cuti'])
@section('content')
<div class="card card-info col-sm-12 p-0">
    <div class="card-header">
        <h3 class="card-title">Kelola Data Karyawan</h3>
    </div>
</div>
@include('layouts.alert')
<section class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('kelola.daftar') }}" class="btn btn-success">
                    <i class="fas fa-plus-square"></i>
                    Tambah Karyawan Baru</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Daftar Karyawan</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">

                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Jabatan</th>
                                    <th>Divisi</th>
                                    <th>Jumlah Cuti</th>
                                    <th>Jumlah Izin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user['name']}}</td>
                                    <td>{{$user['nik']}}</td>
                                    @switch($user['role_id'])
                                    @case(1)<td>Admin</td>@break
                                    @case(2)<td>Manajer Divisi</td> @break
                                    @case(3)<td>Karyawan</td>@break
                                    @endswitch

                                    @switch($user['divisi_id'])
                                    @case(1)<td>Divisi Admin</td>@break
                                    @case(2)<td>Divisi A</td> @break
                                    @case(3)<td>Divisi B</td>@break
                                    @case(4)<td>Divisi C</td>@break
                                    @case(5)<td>Divisi D</td>@break
                                    @endswitch

                                    <td>{{$user['cutis_count']}}</td>
                                    <td>{{$user['izins_count']}}</td>


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