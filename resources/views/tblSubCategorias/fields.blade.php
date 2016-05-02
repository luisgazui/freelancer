<!-- Areas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('AreaS', 'Areas:') !!}
    {!! Form::text('AreaS', null, ['class' => 'form-control']) !!}
</div>

<!-- Categorias Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Categorias_id', 'Categorias Id:') !!}
    {!! Form::select('Categorias_id', ['' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tblSubCategorias.index') !!}" class="btn btn-default">Cancel</a>
</div>
