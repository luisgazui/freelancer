<!-- Nombreplan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombreplan', 'Nombreplan:') !!}
    {!! Form::text('nombreplan', null, ['class' => 'form-control']) !!}
</div>

<!-- Costo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('costo', 'Costo:') !!}
    {!! Form::text('costo', null, ['class' => 'form-control']) !!}
</div>

<!-- Vigencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vigencia', 'Vigencia:') !!}
    {!! Form::number('vigencia', null, ['class' => 'form-control']) !!}
</div>

<!-- Imagen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imagen', 'Imagen:') !!}
    {!! Form::file('imagen') !!}
</div>
<div class="clearfix"></div>

<!-- Numeroproyectos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numeroproyectos', 'Numeroproyectos:') !!}
    {!! Form::number('numeroproyectos', null, ['class' => 'form-control']) !!}
</div>

<!-- Numeroexperiencias Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numeroexperiencias', 'Numeroexperiencias:') !!}
    {!! Form::number('numeroexperiencias', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tblPlanes.index') !!}" class="btn btn-default">Cancel</a>
</div>
