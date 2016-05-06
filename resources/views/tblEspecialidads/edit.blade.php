@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit TblEspecialidad</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblEspecialidad, ['route' => ['tblEspecialidads.update', $tblEspecialidad->id], 'method' => 'patch']) !!}

            @include('tblEspecialidads.fields')

            {!! Form::close() !!}
        </div>
@endsection