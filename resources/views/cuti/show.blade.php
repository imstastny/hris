@extends('layouts.main',['title' => 'Detail Pengajuan'])
@section('content')
<div class="card card-info col-sm-12">
    <div class="card-header">
        <h3 class="card-title">Formulir Pengajuan Cuti</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
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

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Jenis Cuti</label>
                    <text class="form-control" id="kategori" name="kategori">{{$cuti->kategori->nama}}</text>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <text class="form-control" id="tgl_mulai" name="tgl_mulai">{{\Carbon\Carbon::parse($cuti->tgl_mulai)->format('d/m/Y')}}</text>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Tanggal Selesai</label>
                    <text class="form-control" id="tgl_selesai" name="tgl_selesai">{{\Carbon\Carbon::parse($cuti->tgl_selesai)->format('d/m/Y')}}</text>
                </div>
            </div>
            <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                    <label>Deskripsi</label>

                    <p>{!! nl2br($cuti->keterangan) !!}</p>

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
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Acc Mandiv</label>
                    <text class="form-control" id="acc_mandiv" name="acc_mandiv">{{$cuti->acc_mandiv->nama}}</text>
                </div>
            </div>

            @if($cuti->acc_mandiv_id >= 2)
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Acc HRD</label>
                    <text class="form-control" id="acc_hrd" name="acc_hrd">{{$cuti->acc_hrd->nama}}</text>
                </div>
            </div>
            @endif
        </div>
        <!-- /.card-body -->
    </div>
</div>

@endsection