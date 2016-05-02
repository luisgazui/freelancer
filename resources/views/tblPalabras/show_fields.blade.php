<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tblPalabras->id !!}</p>
</div>

<!-- Palabra Field -->
<div class="form-group">
    {!! Form::label('Palabra', 'Palabra:') !!}
    <p>{!! $tblPalabras->Palabra !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tblPalabras->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tblPalabras->updated_at !!}</p>
</div>

