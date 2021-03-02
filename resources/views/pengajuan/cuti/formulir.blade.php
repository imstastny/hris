@extends('layouts.main')
@section('content')
<div class="card card-info col-sm-12">
    <div class="card-header">
        <h3 class="card-title">Formulir Pengajuan Cuti</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="" method="">
            @csrf
            @include('layouts.form-control')
        </form>

    </div>
    <!-- /.card-body -->
</div>

@endsection