<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tblSanciones->id !!}</p>
</div>

<!-- Severidad Field -->
<div class="form-group">
    {!! Form::label('Severidad', 'Severidad:') !!}
    <p>{!! $tblSanciones->Severidad !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('Descripcion', 'Descripcion:') !!}
    <p>{!! $tblSanciones->Descripcion !!}</p>
</div>

<!-- Duracion Id Field -->
<div class="form-group">
    {!! Form::label('Duracion_id', 'Duracion Id:') !!}
    <p>{!! $tblSanciones->Duracion_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tblSanciones->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tblSanciones->updated_at !!}</p>
</div>

