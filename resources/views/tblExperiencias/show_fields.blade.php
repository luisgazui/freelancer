<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tblExperiencia->id !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    <p>{!! $tblExperiencia->Descripcion !!}</p>
</div>

<!-- Annos Exp Field -->
<div class="form-group">
    {!! Form::label('Annos_Exp', 'Annos Exp:') !!}
    <p>{!! $tblExperiencia->Annos_Exp !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tblExperiencia->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tblExperiencia->updated_at !!}</p>
</div>

