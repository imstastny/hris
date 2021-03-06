@extends('layouts.main',['title' => 'Daftar Pengajuan'])
@section('content')
<div class="content-header px-3">
    <h4> Daftar Pengajuan Izin</h4>
</div>

@include('layouts.alert')

<section class="container">

    <div class="container-fluid">
        <div class="callout callout-info col-sm-12 mb-4">
            <h6><b>Informasi</b></h6>

            <p>(1) Tabel berisi pengajuan anggota pada divisi anda yang belum ditanggapi oleh manajer divisi atau admin.</p>
            <p>(2) Pastikan memeriksa pengajuan karyawan lain untuk menghindari pengajuan secara bersamaan.</p>
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
                                    <th>Tanggal Izin</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($izins as $izin)
                                <tr>
                                    <td>{{$izin->tgl_izin}}</td>
                                    <td>{{$izin->wkt_mulai}}</td>
                                    <td>{{$izin->wkt_selesai}}</td>
                                    <td>
                                        <a href="/izin/{{$izin->slug}}/edit" class="btn btn-sm btn-info">detail</a>
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