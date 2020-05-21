@extends('layouts.app')

@section('content')
   <button type="button" class="btn btn-block btn-lg btn-primary waves-effect">Quản lý Users</button>
    @include('adminlte-templates::common.errors')
    <div class="row clearfix" style="margin-top: 20px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Users
                    </h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            {!! Form::model($users, ['route' => ['admin.users.update', $users->id], 'method' => 'patch']) !!}

                                @include('backend.users.fields')

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