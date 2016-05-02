<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tblMonedas->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('Nombre', 'Nombre:') !!}
    <p>{!! $tblMonedas->Nombre !!}</p>
</div>

<!-- Simbolo Field -->
<div class="form-group">
    {!! Form::label('simbolo', 'Simbolo:') !!}
    <p>{!! $tblMonedas->simbolo !!}</p>
</div>

<!-- Pais Id Field -->
<div class="form-group">
    {!! Form::label('pais_id', 'Pais Id:') !!}
    <p>{!! $tblMonedas->pais_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tblMonedas->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tblMonedas->updated_at !!}</p>
</div>

