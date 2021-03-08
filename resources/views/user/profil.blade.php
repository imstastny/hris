@extends('layouts.main',['title' => 'Form Pengajuan Cuti'])
@section('content')
<div class="container">
    <div class="callout callout-info col-sm-12 mb-4">
        <h6><b>Informasi</b></h6>

        <p>(1)Di kolom Jumlah cuti dan izin saya ingin menampilkan jumlah cuti dan izin yang sudah disetujui admin hrd di halaman user ini (login). logika = select countauth()->user()->cutis()-> (acc_hrd_id = 3 alias disetujui)
        </p>
        <p>(2) Kolom masih hanya berisi jumlah pengajuan dari user hasil dari count auth()->user()->cutis()</p>
    </div>
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
                    <label>Jumlah Cuti</label>
                    <p class="form-control">{{count($user->cutis)}}</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Jumlah Izin</label>
                    <p class="form-control">{{count($user->izins)}}</p>
                </div>
            </div>
        </div>

    </div>
    <!-- /.card-body -->
</div>

@endsection