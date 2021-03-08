@extends('layouts.main',['title' => 'Daftar Pengajuan'])
@section('content')
<div class="card card-info col-sm-12 p-0">
    <div class="card-header">
        <h1 class="card-title">Daftar Pengajuan Cuti</h1>
    </div>
</div>
@include('layouts.alert')

<section class="container">

    <div class="container-fluid">
        <div class="callout callout-info col-sm-12 mb-4">
            <h6><b>Informasi</b></h6>

            <p>(1) Tabel berisi pengajuan anggota pada divisi anda yang belum ditanggapi oleh manajer divisi atau admin.</p>
            <p>(2) Pastikan memeriksa pengajuan karyawan lain untuk menghindari pengajuan secara bersamaan.</p>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('izin.create') }}" class="btn btn-success">
                    <i class="fas fa-plus-square"></i>
                    Ajukan Permohonan Izin</a>
            </div>
        </div>
        <hr>
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
                                    <th>Tanggal Izin</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Acc Mandiv</th>
                                    <th>Acc HRD</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($izins as $izin)
                                <tr>
                                    <td>{{$izin->user->name}}</td>
                                    <td>{{\Carbon\Carbon::parse($izin->tgl_izin)->format('d/m/Y')}}</td>
                                    <td>{{$izin->wkt_mulai}}.00</td>
                                    <td>{{$izin->wkt_selesai}}.00</td>
                                    <td>{{$izin->acc_mandiv->nama}}</td>
                                    <td>{{$izin->acc_hrd->nama}}</td>
                                    <td>
                                        <a href="/izin/{{$izin->slug}}" class="btn btn-sm btn-info">detail</a>
                                    </td>
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