@extends('layouts.main',['title' => 'Form Pengajuan Cuti'])
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
        <div class="col-md-11 mx-2">
            <table class="table table-bordered">
                <tr>
                    <td style="width: 15rem;"> <b>Nama Lengkap</b></td>
                    <td> {{$user->name}}</td>
                </tr>
                <tr>
                    <td style="width: 15rem;"> <b>Nomor Induk Karyawan</b></td>
                    <td> {{$user->nik}}</td>
                </tr>
                <tr>
                    <td style="width: 15rem;"><b>Jabatan</b></td>
                    <td> {{$user->role->nama}}</td>
                </tr>
                <tr>
                    <td style="width: 15rem;"><b>Divisi</b></td>
                    <td> {{$user->divisi->nama}}</td>
                </tr>
                <tr>
                    <td style="width: 15rem;"><b>Email</b></td>
                    <td> {{$user->email}}</td>
                </tr>
                <tr>
                    <td style="width: 15rem;"><b>Jenis Kelamin</b></td>
                    <td> {{$user->gender}}</td>
                </tr>
                <tr>
                    <td><b>Cuti Tahunan</b></td>
                    <td>{{$totalCuti1}} Hari</td>
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