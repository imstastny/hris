@extends('layouts.main',['title' => 'Rekap Pengajuan Cuti'])
@section('content')
<div class="content-header px-3">
    <h4> Rekap Data Pengajuan Izin Karyawan</h4>
</div>
<section class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Rekap Permohonan Izin Karyawan</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">

                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Jabatan</th>
                                    <th>Divisi</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Tanggal Izin</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Acc Mandiv</th>
                                    <th>Acc HRD</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($izins as $izin)
                                <tr>
                                    <td>{{$izin->user->role->nama}}</td>
                                    <td>{{$izin->user->nik}}</td>
                                    <td>{{$izin->user->role->nama}}</td>
                                    <td>{{$izin->user->divisi->nama}}</td>
                                    <td>{{$izin->created_at->format('d/m/Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($izin->tgl_izin)->format('d/m/Y')}}</td>
                                    <td>{{$izin->wkt_mulai}}</td>
                                    <td>{{$izin->wkt_selesai}}</td>
                                    <td>{{$izin->acc_mandiv->nama}}</td>
                                    <td>{{$izin->acc_hrd->nama}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

@endsection