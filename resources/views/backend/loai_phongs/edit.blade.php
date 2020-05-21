@extends('layouts.app')

@section('content')
   <button type="button" class="btn btn-block btn-lg btn-primary waves-effect">Quản lý Loai Phong</button>
    @include('adminlte-templates::common.errors')
    <div class="row clearfix" style="margin-top: 20px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Loại Phòng
                    </h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            {!! Form::model($loaiPhong, ['route' => ['admin.loaiPhongs.update', $loaiPhong->id], 'method' => 'patch']) !!}

                                @include('backend.loai_phongs.fields')

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