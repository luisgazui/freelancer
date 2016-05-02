<!-- Duracion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Duracion', 'Duracion:') !!}
    {!! Form::text('Duracion', null, ['class' => 'form-control']) !!}
</div>

<!-- Tiempo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Tiempo', 'Tiempo:') !!}
    {!! Form::number('Tiempo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tblDuracions.index') !!}" class="btn btn-default">Cancel</a>
</div>
