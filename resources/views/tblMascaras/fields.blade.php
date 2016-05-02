<!-- Mascara Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Mascara', 'Mascara:') !!}
    {!! Form::text('Mascara', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tblMascaras.index') !!}" class="btn btn-default">Cancel</a>
</div>
