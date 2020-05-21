<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $tang->id }}</p>
</div>

<!-- Ten Field -->
<div class="form-group">
    {!! Form::label('ten', 'Ten:') !!}
    <p>{{ $tang->ten }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tang->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tang->updated_at }}</p>
</div>

