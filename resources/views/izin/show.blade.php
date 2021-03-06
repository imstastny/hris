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
                    <input type="text" class="form-control" id="tgl_izin" name="tgl_izin" value="{{$izin->tgl_izin}}" disabled>
                    <div class="text-danger">
                        @error('tgl_izin')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="exampleSelectRounded0">Waktu Mulai</label>
                    <input type="text" class="form-control" id="wkt_mulai" name="wkt_mulai" value="{{$izin->wkt_mulai}}" disabled>
                    <div class="text-danger">
                        @error('wkt_mulai')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="exampleSelectRounded0">Waktu Selesai</label>
                    <input type="text" class="form-control" id="wkt_selesai" name="wkt_selesai" value="{{$izin->wkt_selesai}}" disabled>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" rows="3" id="keterangan" name="keterangan" disabled>{{$izin->keterangan}}</textarea>
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
        <div class="flex">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Acc Mandiv</label>
                    <input type="text" class="form-control" id="acc_mandiv" name="acc_mandiv" value="{{$izin->acc_mandiv->nama}}" disabled>
                </div>
            </div>
        </div>
        @if($izin->acc_mandiv_id >= 2)
        <div class="col-sm-3">
            <div class="form-group">
                <label>Acc HRD</label>
                <input type="text" class="form-control" id="acc_hrd" name="acc_hrd" value="{{$izin->acc_hrd->nama}}" disabled>
            </div>
        </div>
        @endif

    </div>
    <!-- /.card-body -->
</div>

@endsection