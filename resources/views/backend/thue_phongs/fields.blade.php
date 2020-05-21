<!-- Id Sinh Vien Field -->
<div class="col-md-6">
    <b>Id Sinh Vien: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::number('id_sinh_vien', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Id Phong Field -->
<div class="col-md-6">
    <b>Id Phong: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::number('id_phong', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Ngay Dang Ky Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ngay_dang_ky', 'Ngay Dang Ky:') !!}
    {!! Form::date('ngay_dang_ky', null, ['class' => 'form-control','id'=>'ngay_dang_ky']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#ngay_dang_ky').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Trang Thai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('trang_thai', 'Trang Thai:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('trang_thai', 0) !!}
        {!! Form::checkbox('trang_thai', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="material-icons">save</i><span class="icon-name">Lưu</span>', ['class' => 'btn btn-primary','type' => 'submit']) !!}
    <a href="{{ route('admin.thuePhongs.index') }}" class="btn btn-default"><i class="material-icons">first_page</i><span class="icon-name">Đóng</span></a>
</div>
