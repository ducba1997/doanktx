<!-- Ten Field -->
<div class="col-md-6">
    <b>Tên: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::text('ten', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="material-icons">save</i><span class="icon-name">Lưu</span>', ['class' => 'btn btn-primary','type' => 'submit']) !!}
    <a href="{{ route('admin.quyens.index') }}" class="btn btn-default"><i class="material-icons">first_page</i><span class="icon-name">Đóng</span></a>
</div>
