<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $thuePhong->id }}</p>
</div>

<!-- Id Sinh Vien Field -->
<div class="form-group">
    {!! Form::label('id_sinh_vien', 'Id Sinh Vien:') !!}
    <p>{{ $thuePhong->id_sinh_vien }}</p>
</div>

<!-- Id Phong Field -->
<div class="form-group">
    {!! Form::label('id_phong', 'Id Phong:') !!}
    <p>{{ $thuePhong->id_phong }}</p>
</div>

<!-- Ngay Dang Ky Field -->
<div class="form-group">
    {!! Form::label('ngay_dang_ky', 'Ngay Dang Ky:') !!}
    <p>{{ $thuePhong->ngay_dang_ky }}</p>
</div>

<!-- Trang Thai Field -->
<div class="form-group">
    {!! Form::label('trang_thai', 'Trang Thai:') !!}
    <p>{{ $thuePhong->trang_thai }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $thuePhong->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $thuePhong->updated_at }}</p>
</div>

