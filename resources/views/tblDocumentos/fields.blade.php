<!-- Documento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Documento', 'Documento:') !!}
    {!! Form::text('Documento', null, ['class' => 'form-control']) !!}
</div>

<!-- Pais Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Pais_id', 'Pais Id:') !!}
    {!! Form::select('Pais_id', $pais, null, ['class' => 'form-control drdHtmlType']) !!}
</div>

<!-- Empresa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Empresa', 'Empresa:') !!}
    {!! Form::select('Empresa', ['0' => 'Particular', '1' => 'Empresa'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tblDocumentos.index') !!}" class="btn btn-default">Cancel</a>
</div>
