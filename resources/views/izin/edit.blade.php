@extends('layouts.main',['title' => 'Form Pengajuan Izin'])
@section('content')
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
                    <form action="/izin/{{$izin->slug}}/delete" method="post">
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
<div class="card card-info col-sm-12">
    <div class="card-header">
        <h3 class="card-title">Formulir Pengajuan Izin</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="" method="post">
            @method('patch')
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tanggal Izin</label>
                        <input type="date" class="form-control" id="tgl_izin" name="tgl_izin" value="{{old('tgl_izin') ?? $izin->tgl_izin}}">
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
                        <select class="custom-select rounded-0" id="wkt_mulai" name="wkt_mulai">
                            <option value="{{old('wkt_mulai') ?? $izin->wkt_mulai}}">{{$izin->wkt_mulai}}.00</option>
                            @for ($i = 7; $i < 22; $i++) <option value="{{$i}}">{{$i}}.00</option>
                                @endfor
                        </select>
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
                        <select class="custom-select rounded-0" id="wkt_selesai" name="wkt_selesai">
                            <option value="{{old('wkt_selesai') ?? $izin->wkt_selesai}}">{{$izin->wkt_selesai}}.00</option>
                            @for ($i = 7; $i < 22; $i++) <option value="{{$i}}">{{$i}}.00</option>
                                @endfor
                        </select>
                        <div class="text-danger">
                            @error('wkt_mulai')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" rows="3" id="keterangan" name="keterangan">{{old('keterangan') ?? $izin->keterangan}}</textarea>
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
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="exampleSelectRounded0">Acc Mandiv</label>
                        <select class="custom-select rounded-0" id="acc_mandiv" name="acc_mandiv">
                            @foreach($acc_mandivs as $acc_mandiv)
                            <option {{$acc_mandiv->id == $izin->acc_mandiv_id ? 'selected' : ''}} value="{{$acc_mandiv->id}}">{{$acc_mandiv->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if($izin->acc_mandiv_id == 3)
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="exampleSelectRounded0">Acc HRD</label>
                        <select class="custom-select rounded-0" id="acc_hrd" name="acc_hrd">
                            @foreach($acc_hrds as $acc_hrd)
                            <option {{$acc_hrd->id == $izin->acc_hrd_id ? 'selected' : ''}} value="{{$acc_hrd->id}}">{{$acc_hrd->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif
            </div>

            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-plus-square"></i>
                    Simpan
                </button>
            </div>
        </form>

    </div>
    <!-- /.card-body -->
</div>

@endsection