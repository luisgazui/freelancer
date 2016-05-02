<!-- Nombreb Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NombreB', 'Nombreb:') !!}
    {!! Form::text('NombreB', null, ['class' => 'form-control']) !!}
</div>

<!-- Pais Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Pais_id', 'Pais Id:') !!}
    {!! Form::select('Pais_id', $pais, null, ['class' => 'form-control drdHtmlType']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tblBancos.index') !!}" class="btn btn-default">Cancel</a>
</div>
