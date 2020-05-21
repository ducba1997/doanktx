<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $khu->id }}</p>
</div>

<!-- Ten Field -->
<div class="form-group">
    {!! Form::label('ten', 'Ten:') !!}
    <p>{{ $khu->ten }}</p>
</div>

<!-- Thong Tin Field -->
<div class="form-group">
    {!! Form::label('thong_tin', 'Thong Tin:') !!}
    <p>{{ $khu->thong_tin }}</p>
</div>

<!-- Id Nguoi Quan Ly Field -->
<div class="form-group">
    {!! Form::label('id_nguoi_quan_ly', 'Id Nguoi Quan Ly:') !!}
    <p>{{ $khu->id_nguoi_quan_ly }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $khu->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $khu->updated_at }}</p>
</div>

