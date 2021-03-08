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

            <p>(1) jika admin hrd yang login (nik = adminhrd, role_id = 1, divisi_id =1), HANYA akan menampilkan pengajuan yang sudah disetujui mandiv (acc_mandiv_id=3).
            <p>(2)jika manajer divisi yang login(role_id = 2) HANYA akan menampilkan berdasarkan divisinya masing masing.</p>
            <p>(3) Belum dapat di filter, masih daftar semua user</p>
        </div>
        <hr>
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
                                    <th>NIK</th>
                                    <th>Jabatan</th>
                                    <th>Divisi</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cutis as $cuti)
                                <tr>
                                    <td>{{$cuti->user->name}}</td>
                                    <td>{{$cuti->user->nik}}</td>
                                    <td>{{$cuti->user->role->nama}}</td>
                                    <td>{{$cuti->user->divisi->nama}}</td>
                                    <td>{{\Carbon\Carbon::parse($cuti->tgl_mulai)->format('d/m/Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($cuti->tgl_selesai)->format('d/m/Y')}}</td>
                                    <td>
                                        <a href="/cuti/{{$cuti->slug}}/edit" class="btn btn-sm btn-info">detail</a>
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