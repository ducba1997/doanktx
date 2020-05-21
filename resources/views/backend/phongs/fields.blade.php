
<?php

use App\Models\Manage\GioiTinh;
use App\Models\Manage\Khoa;
use App\Models\Manage\Khu;
use App\Models\Manage\LoaiPhong;
use App\Models\Manage\Tang;

$gioitinhItems=GioiTinh::all()->pluck('ten','id');
    $khoaItems=Khoa::all()->pluck('ten','id');
    $khuItems=Khu::all()->pluck('ten','id');
    $tangItems=Tang::all()->pluck('ten','id');
    $loaiphongItems=LoaiPhong::all()->pluck('ten','id');
    $trang_thai=array('1'=>'Mở','0'=>'Đóng');
?>


<!-- Id Tang Field -->
<div class="col-md-6">
    <p>
        <b>Tầng</b>
    </p>
    {!! Form::select('id_tang',$tangItems, null, ['class' => 'form-control show-tick']) !!}
</div>

<!-- Ten Field -->
<div class="col-md-6">
    <b>Tên: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::text('ten', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Id Loai Phong Field -->
<div class="col-md-6">
    <p>
        <b>Loại phòng</b>
    </p>
    {!! Form::select('id_loai_phong',$loaiphongItems, null, ['class' => 'form-control show-tick']) !!}
</div>

<!-- Id Khu Field -->
<div class="col-md-6">
    <p>
        <b>Khu</b>
    </p>
    {!! Form::select('id_khu',$khuItems, null, ['class' => 'form-control show-tick']) !!}
</div>

<!-- Gia Field -->
<div class="col-md-6">
    <b>Giá: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::text('gia', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Thong Tin Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('thong_tin', 'Thông Tin:') !!}
    <div class="form-line">
        {!! Form::textarea('thong_tin', null, ['class' => 'form-control']) !!}
        </div>
</div>

<!-- Id Gioi Tinh Field -->
<div class="col-md-6">
    <p>
        <b>Phòng dành cho</b>
    </p>
    {!! Form::select('id_gioi_tinh',$gioitinhItems, null, ['class' => 'form-control show-tick']) !!}
</div>
<!-- So Luong Nguoi Field -->
<div class="col-md-6">
    <b>Số Lượng Nguời có thể ở: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::number('so_luong_nguoi', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="col-md-6">
    <p>
        <b>Trạng thái</b>
    </p>
    {!! Form::select('trang_thai',$trang_thai, null, ['class' => 'form-control show-tick']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="material-icons">save</i><span class="icon-name">Lưu</span>', ['class' => 'btn btn-primary','type' => 'submit']) !!}
    <a href="{{ route('admin.phongs.index') }}" class="btn btn-default"><i class="material-icons">first_page</i><span class="icon-name">Đóng</span></a>
</div>
