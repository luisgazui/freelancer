<!-- Pais Id Field -->
<div class="form-group">
    <label class="col-md-4 control-label">Pais</label>
     <div class="col-md-6">
        {!! Form::select('pais_id', $pais, null, ['class' => 'form-control', 
        'placeholder' => 'Seleccione un pais', 
        'id' => 'pais_id',
        ]) !!}
     </div>
</div>

<!-- Name Field -->
<div class="form-group">
    <label class="col-md-4 control-label">Nombres</label>
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control',]) !!}
    </div>
</div>

<!-- Lastname Field -->
<div class="form-group">
    <label class="col-md-4 control-label">Apellidos</label>
     <div class="col-md-6">
        {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Documento Id Field -->

<!-- Tipousuario Id Field -->
<div class="form-group">
    <label class="col-md-4 control-label">Tipo de Usuario</label>
     <div class="col-md-6">
        {!! Form::select('tipousuario_id', $tusuario, null, ['class' => 'form-control',
        'placeholder' => 'Tipo',
        'id' => 'tipousuario_id',
        'disabled']) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Tipo de Identificacion</label>
     <div class="col-md-6">
        {!! Form::select('documento_id', ['1' => '1'], null, ['class' => 'form-control',
        'placeholder' => 'Tipo de documento',
        'id' => 'documento_id',
        'disabled']) !!}
    </div>
</div>

<!-- Documentoi Field -->
<div class="form-group">
    <label class="col-md-4 control-label">Numero</label>
     <div class="col-md-6">
        {!! Form::text('documentoi', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Email Field -->
<div class="form-group">
    <label class="col-md-4 control-label">Correo Electronico</label>
     <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Password Field -->
<div class="form-group">
    <label class="col-md-4 control-label">Password</label>
     <div class="col-md-6">
        {!! Form::password('password', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Direccion Field -->
<div class="form-group">
    <label class="col-md-4 control-label">Direccion</label>
     <div class="col-md-6">
        {!! Form::textarea('Direccion', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
        {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! url('/home') !!}" class="btn btn-default">Cancel</a>
</div>
