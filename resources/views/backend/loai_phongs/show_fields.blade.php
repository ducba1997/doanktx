<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $loaiPhong->id }}</p>
</div>

<!-- Ten Field -->
<div class="form-group">
    {!! Form::label('ten', 'Ten:') !!}
    <p>{{ $loaiPhong->ten }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $loaiPhong->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $loaiPhong->updated_at }}</p>
</div>

