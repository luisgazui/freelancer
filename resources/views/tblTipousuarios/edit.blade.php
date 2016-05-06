@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit TblTipousuario</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblTipousuario, ['route' => ['tblTipousuarios.update', $tblTipousuario->id], 'method' => 'patch']) !!}

            @include('tblTipousuarios.fields')

            {!! Form::close() !!}
        </div>
@endsection