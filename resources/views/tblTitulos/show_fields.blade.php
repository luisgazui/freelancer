<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tblTitulos->id !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    <p>{!! $tblTitulos->Descripcion !!}</p>
</div>

<!-- Anno Est Field -->
<div class="form-group">
    {!! Form::label('Anno_est', 'Anno Est:') !!}
    <p>{!! $tblTitulos->Anno_est !!}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{!! $tblTitulos->tipo !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tblTitulos->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tblTitulos->updated_at !!}</p>
</div>

