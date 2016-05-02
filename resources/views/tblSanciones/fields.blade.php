<!-- Severidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Severidad', 'Severidad:') !!}
    {!! Form::number('Severidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    {!! Form::text('Descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Duracion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Duracion_id', 'Duracion Id:') !!}
    {!! Form::select('Duracion_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tblSanciones.index') !!}" class="btn btn-default">Cancel</a>
</div>
