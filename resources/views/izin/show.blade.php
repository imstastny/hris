@extends('layouts.main',['title' => 'Form Pengajuan Cuti'])
@section('content')
<div class="card card-info col-sm-12">
    <div class="card-header">
        <h3 class="card-title">Formulir Pengajuan Izin</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Tanggal Izin</label>
                    <text class="form-control" id="tgl_izin" name="tgl_izin" value="{{$izin->tgl_izin}}" disabled>{{$izin->tgl_izin}}</text>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="exampleSelectRounded0">Waktu Mulai</label>
                    <text class="form-control" id="wkt_mulai" name="wkt_mulai" disabled>{{$izin->wkt_mulai}}</text>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="exampleSelectRounded0">Waktu Selesai</label>
                    <text class="form-control" id="wkt_selesai" name="wkt_selesai" disabled>{{$izin->wkt_selesai}}</text>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                    <label>Keterangan</label>
                    <text class="form-control" rows="3" id="keterangan" name="keterangan">{{$izin->keterangan}}</text>
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
        <div class="flex">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Acc Mandiv</label>
                    <text class="form-control" id="acc_mandiv" name="acc_mandiv" value="" disabled>{{$izin->acc_mandiv->nama}}</text>
                </div>
            </div>
        </div>
        @if($izin->acc_mandiv_id >= 2)
        <div class="col-sm-3">
            <div class="form-group">
                <label>Acc HRD</label>
                <text class="form-control" id="acc_mandiv" name="acc_mandiv" value="" disabled>{{$izin->acc_hrd->nama}}</text>
            </div>
        </div>
    </div>
    @endif

</div>
<!-- /.card-body -->
</div>

@endsection