<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    {!! Form::text('Descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Annos Exp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Annos_Exp', 'Annos Exp:') !!}
    {!! Form::number('Annos_Exp', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tblExperiencias.index') !!}" class="btn btn-default">Cancel</a>
</div>
