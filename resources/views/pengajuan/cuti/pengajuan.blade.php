@extends('layouts.main',['title' => 'Daftar Pengajuan'])
@section('content')
<div class="content-header px-3">
    <h4> Daftar Pengajuan Cuti</h4>
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
                <a href="{{route('cuti.formulir') }}" class="btn btn-success">
                    <i class="fas fa-plus-square"></i>
                    Ajukan Permohonan Cuti</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Permohonan Cuti Divisi</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Jumlah Hari</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cutis as $cuti)
                                <tr>
                                    <td>{{$cuti->slug}}</td>
                                    <td>Alexander Pierce</td>
                                    <td>{{$cuti->tgl_mulai}}</td>
                                    <td>{{$cuti->tgl_selesai}}</td>
                                    <td>{{$cuti->jml_hari}}</td>
                                    <td>
                                        <a href="/cuti/pengajuan/{{$cuti->slug}}" class="btn btn-info">detail</a>
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