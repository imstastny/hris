@extends('layouts.main',['title' => 'Profil'])
@section('content')
<div class="container">

</div>
<div class="card card-info col-sm-12">
    <div class="card-header">
        <h3 class="card-title">Profil</h3>
    </div>
    <br>
    <!-- /.card-header -->
    <div class="row">
        <div class="card-body box-profile">
            <div class="text-center">
                <img src="{{ asset('layout/dist/img/user.png') }}" class="img-circle elevation-1" style="height: 5em;" alt="User Image">
            </div>

            <h3 class="profile-username text-center">{{$user->name}}</h3>

            <!-- <p class="text-muted text-center">Software Engineer</p> -->

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Nama Lengkap</b>
                    <ul class="float-right">{{$user->name}}</ul>
                </li>
                <li class="list-group-item">
                    <b>Nomor Induk Karyawan</b>
                    <ul class="float-right">{{$user->nik}}</ul>
                </li>
                <li class="list-group-item">
                    <b>Divisi</b>
                    <ul class="float-right">{{$user->divisi->nama}}</ul>
                </li>
                <li class="list-group-item">
                    <b>Jabatan</b>
                    <ul class="float-right">{{$user->role->nama}}</ul>
                </li>
                <li class="list-group-item">
                    <b>Jenis Kelamin</b>
                    <ul class="float-right"> {{$user->gender}}</ul>
                </li>
                <li class="list-group-item">
                    <b>Email</b>
                    <ul class="float-right"> {{$user->email}}</ul>
                </li>
            </ul>
        </div>
        <!-- /.card-body -->
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                    <td><b>Cuti Tahunan</b></td>
                    <td class="float-right">{{$totalCuti1}} Hari</td>
                </tr>
                <tr>
                    <td><b>Cuti Haid</b></td>
                    <td>{{$totalCuti2}} Hari</td>
                </tr>
                <tr>
                    <td><b>Cuti Melahirkan</b></td>
                    <td>{{$totalCuti3}} Hari</td>
                </tr>
                <tr>
                    <td><b>Izin</b></td>
                    <td>{{$izin}}</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- /.card-body -->
</div>

@endsection