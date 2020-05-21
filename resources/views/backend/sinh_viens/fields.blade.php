<!-- Ma Sinh Vien Field -->
<div class="col-md-6">
    <b>Mã Sinh Viên: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::text('ma_sinh_vien', null, ['class' => 'form-control']) !!}
        </div>
    </div>
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

<!-- Lop Field -->
<div class="col-md-6">
    <b>Lớp: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::text('lop', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<?php

use App\Models\Manage\GioiTinh;
use App\Models\Manage\Khoa;

    $gioitinhItems=GioiTinh::all()->pluck('ten','id');
    $khoaItems=Khoa::all()->pluck('ten','id');
?>
<!-- Id Gioi Tinh Field -->
<div class="col-md-6">
    <p>
        <b>Giới Tính</b>
    </p>
    {!! Form::select('id_gioi_tinh',$gioitinhItems, null, ['class' => 'form-control show-tick']) !!}
</div>
<!-- Id Khoa Field -->
<div class="col-md-6">
    <p>
        <b>Khoa</b>
    </p>
        {!! Form::select('id_khoa',$khoaItems, null, ['class' => 'form-control show-tick']) !!}
    
</div>
<!-- Dia Chi Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('dia_chi', 'Địa Chỉ:') !!}
    <div class="form-line">
        {!! Form::textarea('dia_chi', null, ['class' => 'form-control']) !!}
    </div>
</div>




<!-- Id Users Field -->
<div class="col-md-6 hidden">
    <b>Users: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::number('id_users', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Dien Thoai Field -->
<div class="col-md-6">
    <b>Điện Thoại: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::text('dien_thoai', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Cmnd Field -->
<div class="col-md-6">
    <b>Cmnd: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::text('cmnd', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Dan Toc Field -->
<div class="col-md-6">
    <b>Dân Tộc: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::text('dan_toc', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Quoc Gia Field -->
<div class="col-md-6">
    <b>Quốc Gia: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::text('quoc_gia', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Ngay Sinh Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ngay_sinh', 'Ngay Sinh:') !!}
    {!! Form::date('ngay_sinh', null, ['class' => 'form-control','id'=>'ngay_sinh']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#ngay_sinh').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Ghi Chu Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('ghi_chu', 'Ghi Chú:') !!}
    <div class="form-line">
        {!! Form::textarea('ghi_chu', null, ['class' => 'form-control']) !!}
    </div>
    
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="material-icons">save</i><span class="icon-name">Lưu</span>', ['class' => 'btn btn-primary','type' => 'submit']) !!}
    <a href="{{ route('admin.sinhViens.index') }}" class="btn btn-default"><i class="material-icons">first_page</i><span class="icon-name">Đóng</span></a>
</div>
