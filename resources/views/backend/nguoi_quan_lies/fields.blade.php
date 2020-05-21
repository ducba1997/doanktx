<!-- Ten Field -->
<div class="col-md-6">
    <b>Tên: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::text('ten', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- So Dien Thoai Field -->
<div class="col-md-6">
    <b>Số Điện Thoại: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::text('so_dien_thoai', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Cmnd Field -->
<div class="col-md-6">
    <b>Cmnd: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::number('cmnd', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Thong Tin Field -->
<div class="col-md-12">
    <b>Thông Tin: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::textarea('thong_tin', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Id Users Field -->
<div class="col-md-6 hidden">
    <b>Id Users: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::number('id_users', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="material-icons">save</i><span class="icon-name">Lưu</span>', ['class' => 'btn btn-primary','type' => 'submit']) !!}
    <a href="{{ route('admin.nguoiQuanLies.index') }}" class="btn btn-default"><i class="material-icons">first_page</i><span class="icon-name">Đóng</span></a>
</div>
