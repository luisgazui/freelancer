<!-- Pais Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Pais', 'Pais:') !!}
    {!! Form::text('Pais', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tblPaises.index') !!}" class="btn btn-default">Cancel</a>
</div>
