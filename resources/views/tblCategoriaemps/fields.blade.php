<!-- Catemp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('catemp', 'Catemp:') !!}
    {!! Form::text('catemp', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tblCategoriaemps.index') !!}" class="btn btn-default">Cancel</a>
</div>
