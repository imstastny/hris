@extends('layouts.main',['title' => 'Form Pengajuan Cuti'])
@section('content')
<div class="card card-info col-sm-12">
    <div class="card-header">
        <h3 class="card-title">Formulir Pengajuan Izin</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="{{ route('izin.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tanggal Izin</label>
                        <input type="date" class="form-control" id="tgl_izin" name="tgl_izin">
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
                            @for ($i = 7; $i < 22; $i++) <option value="{{$i}}">{{$i}}.00</option>
                                @endfor
                        </select>
                        <div class="text-danger">
                            @error('wkt_selesai')
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
                        <textarea class="form-control" rows="3" id="keterangan" name="keterangan" placeholder="Enter ..."></textarea>
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

            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-plus-square"></i>
                    Ajukan
                </button>
            </div>
        </form>

    </div>
    <!-- /.card-body -->
</div>

@endsection