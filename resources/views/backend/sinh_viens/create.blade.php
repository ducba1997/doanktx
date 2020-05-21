@extends('layouts.app')

@section('content')
<button type="button" class="btn btn-block btn-lg btn-primary waves-effect">Quản lý Sinh Vien</button>
<div class="row clearfix" style="margin-top: 20px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Thêm mới
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        {!! Form::open(['route' => 'admin.sinhViens.store']) !!}
                        <div class="col-md-6">
                            <b>Email: </b>
                            <div class="input-group ">
                                <div class="form-line">
                                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
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