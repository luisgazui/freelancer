<!-- Codpais Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codpais', 'Codpais:') !!}
    {!! Form::text('codpais', null, ['class' => 'form-control']) !!}
</div>

<!-- Pais Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pais_id', 'Pais Id:') !!}
    {!! Form::select('pais_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tblCodpais.index') !!}" class="btn btn-default">Cancel</a>
</div>
