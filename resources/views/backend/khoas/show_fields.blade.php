<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $khoa->id }}</p>
</div>

<!-- Ten Field -->
<div class="form-group">
    {!! Form::label('ten', 'Ten:') !!}
    <p>{{ $khoa->ten }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $khoa->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $khoa->updated_at }}</p>
</div>

