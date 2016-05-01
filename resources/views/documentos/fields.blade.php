<!-- Documento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Documento', 'Documento:') !!}
    {!! Form::text('Documento', null, ['class' => 'form-control']) !!}
</div>

<!-- Documento Empresa Field -->
<div class="form-group col-sm-12">
    {!! Form::label('documento_empresa', 'Documento Empresa:') !!}
    <label class="radio-inline">
        {!! Form::radio('documento_empresa', "Empresa", null) !!} Empresa
    </label>
</div>

<!-- Pais Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pais_id', 'Pais Id:') !!}
    {!! Form::text('pais_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('documentos.index') !!}" class="btn btn-default">Cancel</a>
</div>
