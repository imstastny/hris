@extends('layouts.main',['title' => 'Form Pengajuan Cuti'])
@section('content')


<div class="card card-info col-sm-12">
    <div class="card-header">
        <h3 class="card-title">Persetujuan Cuti Atas Nama : {{$cuti->user->name}}
            @if($cuti->acc_hrd_id < 4) <strong>{{$cuti->acc_hrd->nama}} </strong> Admin HRD</h3>@endif
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-1">
                <p>Nama</p>
                <p>NIK</p>
                <p>Jabatan</p>
                <p>Divisi</p>
            </div>
            <div class="col-sm-3">
                <p>: {{$cuti->user->name}}</p>
                <p>: {{$cuti->user->nik}}</p>
                <p>: {{$cuti->user->role->nama}}</p>
                <p>: {{$cuti->user->divisi->nama}}</p>
            </div>
        </div>
        <hr>
        @if($role == 2 && $cuti->acc_mandiv_id == 3 && $cuti->acc_hrd_id >= 2)
        <!-- /.card-header -->

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Jenis Cuti</label>
                    <text class="form-control" id="kategori" name="kategori">{{$cuti->kategori->nama}}</text>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <text class="form-control" id="tgl_mulai" name="tgl_mulai">{{\Carbon\Carbon::parse($cuti->tgl_mulai)->format('d/m/Y')}}</text>
                </div>
            </div>
            <div class="col-sm-4">
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
            <div class="col-sm-6">
                <label>Lampiran</label><br>
                @if($cuti->lampiran)
                <a href="/cuti/lampiran/{{$cuti->slug}}" target="_blank">
                    <img class="img-fluid" src="{{asset($cuti->takeImageCuti)}}" width="100" height="120">
                </a>
                @else -
                @endif
            </div>
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



        @else
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
                <div class="col-sm-4">
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
                <div class="col-sm-4">
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
                <div class="col-sm-7">
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
                <div class="col-sm-5">
                    <label>Lampiran</label><br>
                    @if($cuti->lampiran)
                    <a href="/cuti/lampiran/{{$cuti->slug}}" target="_blank">
                        <img class="img-fluid" src="{{asset($cuti->takeImageCuti)}}" width="100" height="120">
                    </a>
                    @else -
                    @endif
                </div>

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
                    <i class="fas fa-save"></i>
                    Simpan
                </button>
            </div>
        </form>
        @endif
    </div>
    <!-- /.card-body -->
</div>

@endsection