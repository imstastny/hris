@extends('layouts.main',['title' => 'Form Pengajuan Cuti'])
@section('content')
<div class="container">
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
                        <form action="/cuti/{{$cuti->slug}}/delete" method="post">
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
</div>

<div class="card card-info col-sm-12">
    <div class="card-header">
        <h3 class="card-title">Formulir Pengajuan Cuti</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nama</label>
                    <p class="form-control">{{$cuti->user->name}}</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>NIK</label>
                    <p class="form-control">{{$cuti->user->nik}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Jabatan</label>
                    <p class="form-control">{{$cuti->user->role->nama}}</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Divisi</label>
                    <p class="form-control">{{$cuti->user->divisi->nama}}</p>
                </div>
            </div>
        </div>
        <hr>
        <form action="/cuti/{{$cuti->slug}}/edit" method="post">
            @method('patch')
            @csrf
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="exampleSelectRounded0">Jenis Cuti</label>
                        <select class="custom-select rounded-0" id="kategori" name="kategori">
                            <option value="{{$cuti->kategori->id}}">{{$cuti->kategori->nama}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" value="{{old('tgl_mulai') ?? $cuti->tgl_mulai}}">
                        <div class="text-danger">
                            @error('tgl_mulai')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" value="{{old('tgl_selesai') ?? $cuti->tgl_selesai}}">
                        <div class="text-danger">
                            @error('tgl_selesai')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" rows="3" id="keterangan" name="keterangan" placeholder="Enter ...">{{old('keterangan') ?? $cuti->keterangan}}</textarea>
                        <div class="text-danger">
                            @error('keterangan')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputFile">Lampiran(optional)</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="row">
                <div class="col-sm-3" {{$role == 2  ?  '' : 'hidden' }}>
                    <div class="form-group">
                        <label for="exampleSelectRounded0">Acc Mandiv</label>
                        <select class="custom-select rounded-0" id="acc_mandiv" name="acc_mandiv">
                            @foreach($acc_mandivs as $acc_mandiv)
                            <option {{$acc_mandiv->id == $cuti->acc_mandiv_id ? 'selected' : ''}} value="{{$acc_mandiv->id}}">{{$acc_mandiv->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-3" {{$cuti->acc_mandiv_id == 3 && $role == 1 ? '' :'hidden'}}>
                    <div class="form-group">
                        <label for="exampleSelectRounded0">Acc HRD</label>
                        <select class="custom-select rounded-0" id="acc_hrd" name="acc_hrd">
                            @foreach($acc_hrds as $acc_hrd)
                            <option {{$acc_hrd->id == $cuti->acc_hrd_id ? 'selected' : ''}} value="{{$acc_hrd->id}}">{{$acc_hrd->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-plus-save"></i>
                    Simpan
                </button>
            </div>
        </form>

    </div>
    <!-- /.card-body -->
</div>

@endsection