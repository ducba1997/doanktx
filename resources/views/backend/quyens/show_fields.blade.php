<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $quyen->id }}</p>
</div>

<!-- Ten Field -->
<div class="form-group">
    {!! Form::label('ten', 'Ten:') !!}
    <p>{{ $quyen->ten }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $quyen->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $quyen->updated_at }}</p>
</div>

