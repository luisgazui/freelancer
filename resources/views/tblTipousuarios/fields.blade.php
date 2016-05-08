<!-- Tipou Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipou', 'Tipou:') !!}
    {!! Form::text('tipou', null, ['class' => 'form-control']) !!}
</div>

<!-- Empresa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empresa', 'Empresa:') !!}
    {!! Form::select('empresa', ['0' => 'Particular', '1' => 'Empresa'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tblTipousuarios.index') !!}" class="btn btn-default">Cancel</a>
</div>
