<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="col-md-6">
    <b>Password: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Trang Thai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('trang_thai', 'Trang Thai:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('trang_thai', 0) !!}
        {!! Form::checkbox('trang_thai', '1', null) !!}
    </label>
</div>


<!-- Remember Token Field -->
<div class="col-md-6">
    <b>Remember Token: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::text('remember_token', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="material-icons">save</i><span class="icon-name">Lưu</span>', ['class' => 'btn btn-primary','type' => 'submit']) !!}
    <a href="{{ route('admin.users.index') }}" class="btn btn-default"><i class="material-icons">first_page</i><span class="icon-name">Đóng</span></a>
</div>
