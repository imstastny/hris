@extends('layouts.main',['title' => 'Form Pengajuan Cuti'])
@section('content')
<div class="card card-info col-sm-12">
    <div class="card-header">
        <h3 class="card-title">Profil</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nama</label>
                    <text class="form-control" id="name" name="name" value="{{$user->name}}" disabled>{{$user->name}}</text>
                </div>
            </div>
        </div>


    </div>
    <!-- /.card-body -->
</div>

@endsection