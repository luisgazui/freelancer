<!-- Especialidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('especialidad', 'Especialidad:') !!}
    {!! Form::text('especialidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Tempo Exp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tempo_exp', 'Tempo Exp:') !!}
    {!! Form::text('tempo_exp', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tblEspecialidads.index') !!}" class="btn btn-default">Cancel</a>
</div>
