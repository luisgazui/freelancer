@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit TblSanciones</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblSanciones, ['route' => ['tblSanciones.update', $tblSanciones->id], 'method' => 'patch']) !!}

            @include('tblSanciones.fields')

            {!! Form::close() !!}
        </div>
@endsection