@extends('layouts.main')
@section('content')
<div class="content-header px-3">
    <h4> Daftar Pengajuan Cuti</h4>
</div>
<br>
<section class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{route('cuti.formulir') }}" class="btn btn-info">
                    <i class="fas fa-plus-square"></i>
                    Ajukan Permohonan Cuti</a>

            </div>
        </div>
    </div>
</section>

@endsection