@extends('layouts.app')

@section('content')
<button type="button" class="btn btn-block btn-lg btn-primary waves-effect">Quản lý Sinh Vien</button>
@include('adminlte-templates::common.errors')
<div class="row clearfix" style="margin-top: 20px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Sinh Viên
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        {!! Form::model($sinhVien, ['route' => ['admin.sinhViens.update', $sinhVien->id], 'method' => 'patch']) !!}
                        <div class="col-md-6">
                            <b>Email: </b>
                            <div class="input-group ">
                                <div class="form-line">
                                    <input class="form-control" name="email" type="email" value="@if($sinhVien->idUsers->email){{$sinhVien->idUsers->email}}@endif">
                                </div>
                            </div>
                        </div>
                        @include('backend.sinh_viens.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@include('adminlte-templates::common.errors')
@endpush