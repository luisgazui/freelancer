@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit TblExperiencia</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblExperiencia, ['route' => ['tblExperiencias.update', $tblExperiencia->id], 'method' => 'patch']) !!}

            @include('tblExperiencias.fields')

            {!! Form::close() !!}
        </div>
@endsection