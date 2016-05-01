<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $documentos->id !!}</p>
</div>

<!-- Documento Field -->
<div class="form-group">
    {!! Form::label('Documento', 'Documento:') !!}
    <p>{!! $documentos->Documento !!}</p>
</div>

<!-- Documento Empresa Field -->
<div class="form-group">
    {!! Form::label('documento_empresa', 'Documento Empresa:') !!}
    <p>{!! $documentos->documento_empresa !!}</p>
</div>

<!-- Pais Id Field -->
<div class="form-group">
    {!! Form::label('pais_id', 'Pais Id:') !!}
    <p>{!! $documentos->pais_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $documentos->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $documentos->updated_at !!}</p>
</div>

