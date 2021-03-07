@extends('layouts.main',['title' => 'Form Pengajuan Cuti'])
@section('content')
<div class="card card-info col-sm-12">
    <div class="card-header">
        <h3 class="card-title">Tambah Karyawan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="{{ route('kelola.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <div class="text-danger">
                            @error('name')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik">
                        <div class="text-danger">
                            @error('nik')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                        <div class="text-danger">
                            @error('email')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <div class="text-danger">
                            @error('password')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-plus-square"></i>
                    Daftar
                </button>
            </div>
        </form>

    </div>
    <!-- /.card-body -->
</div>

@endsection