@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit TblStatusproyecto</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblStatusproyecto, ['route' => ['tblStatusproyectos.update', $tblStatusproyecto->id], 'method' => 'patch']) !!}

            @include('tblStatusproyectos.fields')

            {!! Form::close() !!}
        </div>
@endsection