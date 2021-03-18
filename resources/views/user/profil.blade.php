@extends('layouts.main',['title' => 'Form Pengajuan Cuti'])
@section('content')
<div class="container">

</div>
<div class="card card-info col-sm-12">
    <div class="card-header">
        <h3 class="card-title">Profil</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nama</label>
                    <p class="form-control">{{$user->name}}</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>NIK</label>
                    <p class="form-control">{{$user->nik}}</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Jabatan</label>
                    <p class="form-control">{{$user->role->nama}}</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Divisi</label>
                    <p class="form-control">{{$user->divisi->nama}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Email</label>
                    <p class="form-control">{{$user->email}}</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Gender</label>
                    <p class="form-control">{{$user->gender}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label>Rekap Izin dan Cuti Karyawan</label>
                <table class="table table-bordered">
                    <tr>
                        <td>Cuti Tahunan</td>
                        <td align="center">{{$totalCuti1}}</td>
                    </tr>
                    <tr>
                        <td>Cuti Haid</td>
                        <td align="center">{{$totalCuti2}}</td>
                    </tr>
                    <tr>
                        <td>Izin</td>
                        <td align="center">{{$izin}}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
    <!-- /.card-body -->
</div>

@endsection