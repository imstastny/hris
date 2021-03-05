@extends('layouts.main',['title' => 'Form Pengajuan Cuti'])
@section('content')
<div class="card card-info col-sm-12">
    <div class="card-header">
        <h3 class="card-title">Formulir Pengajuan Cuti</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <form action="{{ route('cuti.store') }}" method="post">
            @csrf
            @include('cuti.form-control')
        </form>

    </div>
    <!-- /.card-body -->
</div>

@endsection