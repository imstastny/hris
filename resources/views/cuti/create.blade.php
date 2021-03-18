@extends('layouts.main',['title' => 'Form Pengajuan Cuti'])
@section('content')
@include('layouts.alert')
<div class="card card-info col-sm-12">
    <div class="card-header">
        <h3 class="card-title">Formulir Pengajuan Cuti</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="{{ route('cuti.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="exampleSelectRounded0">Jenis Cuti</label>
                        <select class="custom-select rounded-0" id="kategori" name="kategori">
                            <option disabled selected>-Pilih Cuti-</option>
                            @foreach($kategoris as $kategori)
                            <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('kategori')
                            {{$message}}
                            @enderror
                        </div>
                        <h2>Sisa Cuti Tahunan : {{$sisaCutis}}</h2>
                        <input value="{{$sisaCutis}}" id="sisa_cuti" name="sisa_cuti" hidden>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai">
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
                        <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai">
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
                        <textarea class="form-control" rows="3" id="keterangan" name="keterangan" placeholder="Enter ..."></textarea>
                        <div class="text-danger">
                            @error('keterangan')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="lampiran">Lampiran(optional)</label>
                        <small><i>*hanya menerima file dengan format gambar.</i></small>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" id="lampiran" name="lampiran">
                            </div>
                        </div>
                    </div>
                </div>
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