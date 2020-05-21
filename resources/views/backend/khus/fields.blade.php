<!-- Ten Field -->
<div class="col-md-6">
    <b>Tên: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::text('ten', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Thong Tin Field -->
<div class="col-md-6">
    <b>Thông Tin: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::text('thong_tin', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<?php
use App\Models\Manage\NguoiQuanLy;

$gioitinhItems=NguoiQuanLy::all()->pluck('ten','id');
?>
<!-- Id Gioi Tinh Field -->
<div class="col-md-6">
    <p>
        <b>Giới Tính</b>
    </p>
    {!! Form::select('id_nguoi_quan_ly',$gioitinhItems, null, ['class' => 'form-control show-tick']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="material-icons">save</i><span class="icon-name">Lưu</span>', ['class' => 'btn btn-primary','type' => 'submit']) !!}
    <a href="{{ route('admin.khus.index') }}" class="btn btn-default"><i class="material-icons">first_page</i><span class="icon-name">Đóng</span></a>
</div>
