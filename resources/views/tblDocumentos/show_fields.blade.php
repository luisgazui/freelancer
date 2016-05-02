<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tblDocumentos->id !!}</p>
</div>

<!-- Documento Field -->
<div class="form-group">
    {!! Form::label('Documento', 'Documento:') !!}
    <p>{!! $tblDocumentos->Documento !!}</p>
</div>

<!-- Pais Id Field -->
<div class="form-group">
    {!! Form::label('Pais_id', 'Pais Id:') !!}
    <p>{!! $tblDocumentos->Pais_id !!}</p>
</div>

<!-- Empresa Field -->
<div class="form-group">
    {!! Form::label('Empresa', 'Empresa:') !!}
    <p>{!! $tblDocumentos->Empresa !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tblDocumentos->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tblDocumentos->updated_at !!}</p>
</div>

