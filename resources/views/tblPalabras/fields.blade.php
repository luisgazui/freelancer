<!-- Palabra Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Palabra', 'Palabra:') !!}
    {!! Form::text('Palabra', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tblPalabras.index') !!}" class="btn btn-default">Cancel</a>
</div>
