@extends('layouts.main',['title' => 'Detail Pengajuan'])
@section('content')
<div class="card card-info col-sm-12">
    <div class="card-header">
        <h3 class="card-title">Formulir Pengajuan Cuti</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="" method="post">
            <!-- <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="Nama" disabled>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" class="form-control" value="1234" disabled>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" value="Jabatan" disabled>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Divisi</label>
                        <input type="text" class="form-control" value="Divisi" disabled>
                    </div>
                </div>
            </div> -->

            <!-- <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Jenis Cuti</label>
                        <select class="form-control" disabled>
                            <option value="1">Cuti Reguler</option>
                            <option value="2">Cuti Haid</option>
                        </select>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" value="{{$cuti->tgl_mulai}}" disabled>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" value="{{$cuti->tgl_selesai}}" disabled>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" rows="3" disabled>{{$cuti->keterangan}}</textarea>
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

            <!-- <div class="row justify-content-center">
                <button type="submit" class="btn btn-info">
                    <i class="fas fa-plus-square"></i>
                    Aksi
                </button>
            </div> -->
        </form>

    </div>
    <!-- /.card-body -->
</div>

@endsection