<?php

use App\Models\Manage\Phong;
use App\Models\Manage\ThuePhong;
use App\Models\Manage\HoaDon;

$phong=Phong::whereIn('id', ThuePhong::where('trang_thai',1)->get()->pluck('id_phong'))
            ->whereNotIn('id',HoaDon::where('thang',date('m'))->where('nam',date('Y'))->get()->pluck('id_phong'))
            ->pluck('ten','id');
    
?>
<!-- Id Phong Field -->
<div class="col-md-6">
    <b>Phòng: </b>
            {!! Form::select('id_phong',$phong, null, ['class' => 'form-control']) !!}
</div>

<!-- Tien Phong Field -->
<div class="col-md-6">
    <b>Tiền Phòng: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::number('tien_phong', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Tien Dien Field -->
<div class="col-md-6">
    <b>Tiền Điện: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::number('tien_dien', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Tien Nuoc Field -->
<div class="col-md-6">
    <b>Tiền Nước: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::number('tien_nuoc', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Thang Field -->
<div class="col-md-6 hidden">
    <b>Thang: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::number('thang', date('m'), ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Nam Field -->
<div class="col-md-6 hidden">
    <b>Nam: </b>
    <div class="input-group">
        <div class="form-line">
            {!! Form::number('nam', date('Y'), ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Trang Thai Thu Tien Field -->
<div class="form-group col-sm-6 hidden">
    {!! Form::label('trang_thai_thu_tien', 'Trang Thai Thu Tien:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('trang_thai_thu_tien', 0) !!}
        {!! Form::checkbox('trang_thai_thu_tien', '1', null) !!}
    </label>
</div>


<!-- Ghi Chu Field -->
<div class="col-md-12">
    <b>Ghi chú: </b>
    <div class="input-group ">
        <div class="form-line">
        {!! Form::textarea('ghi_chu', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="material-icons">save</i><span class="icon-name">Lưu</span>', ['class' => 'btn btn-primary','type' => 'submit']) !!}
    <a href="{{ route('admin.hoaDons.index') }}" class="btn btn-default"><i class="material-icons">first_page</i><span class="icon-name">Đóng</span></a>
</div>
