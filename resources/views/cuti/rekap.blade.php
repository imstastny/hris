@extends('layouts.main',['title' => 'Rekap Pengajuan Cuti'])
@section('content')
<div class="card card-info col-sm-12 p-0">
    <div class="card-header">
        <h1 class="card-title">Daftar Pengajuan Cuti</h1>
    </div>
</div>
@include('layouts.alert')

<section class="container">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Rekap Permohonan Cuti Karyawan</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">

                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Divisi</th>
                                    <th>Jenis Cuti</th>
                                    <th>Tanggal Mengajukan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Acc Mandiv</th>
                                    <th>Acc HRD</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cutis as $cuti)
                                <tr>
                                    <td>{{$cuti->user->name}}</td>
                                    <td>{{$cuti->user->role->nama}}</td>
                                    <td>{{$cuti->user->divisi->nama}}</td>
                                    <td>{{$cuti->kategori->nama}}</td>
                                    <td>{{$cuti->created_at->format('d/m/Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($cuti->tgl_izin)->format('d/m/Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($cuti->tgl_izin)->format('d/m/Y')}}</td>
                                    <td>{{$cuti->acc_mandiv->nama}}</td>
                                    <td>{{$cuti->acc_hrd->nama}}</td>
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
<script>
    $('.toastsDefaultSuccess').click(function() {
        $(document).Toasts('create', {
            class: 'bg-success',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
    });
</script>
@endsection