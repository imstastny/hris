@extends('layouts.main',['title' => 'Form Pengajuan Cuti'])
@section('content')
<div class="card card-info col-sm-12">
    <div class="card-header">
        <h3 class="card-title">Profil</h3>
    </div>
    <div class="d-flex justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-trash-alt"></i>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus data ini ?</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/anggota/{{$user->nik}}/delete" method="post">
                            @method('delete')
                            @csrf
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="/anggota/{{$user->nik}}/edit" method="post">
            @method('patch')
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name') ?? $user->name}}" autocomplete="off">
                        <div class="text-danger">
                            @error('name')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{old('nik') ?? $user->nik}}" autocomplete="off">
                        <div class="text-danger">
                            @error('nik')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="exampleSelectRounded0">Jabatan</label>
                        <select class="custom-select rounded-0" id="role" name="role">
                            @foreach($roles as $role)
                            <option {{$role->id == $user->role_id ? 'selected' : ''}} value="{{$role->id}}">{{$role->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="exampleSelectRounded0">Divisi</label>
                        <select class="custom-select rounded-0" id="divisi" name="divisi">
                            @foreach($divisis as $divisi)
                            <option {{$divisi->id == $user->divisi_id ? 'selected' : ''}} value="{{$divisi->id}}">{{$divisi->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{old('email') ?? $user->email}}" autocomplete="off">
                        <div class="text-danger">
                            @error('email')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>
            </div>
        </form>
        <div class="row">
            <div class="col-sm-4">
                <label>Rekap Izin dan Cuti Karyawan</label>
                <table class="table table-bordered">
                    <tr>
                        <td>Cuti Tahunan</td>
                        <td>{{$cuti1}}</td>
                    </tr>
                    <tr>
                        <td>Cuti Haid</td>
                        <td>{{$cuti2}}</td>
                    </tr>
                    <tr>
                        <td>Izin</td>
                        <td>{{$izin}}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
    <!-- /.card-body -->
</div>

@endsection