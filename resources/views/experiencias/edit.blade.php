@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit experiencia</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($experiencia, ['route' => ['experiencias.update', $experiencia->id], 'method' => 'patch']) !!}

            @include('experiencias.fields')

            {!! Form::close() !!}
        </div>
@endsection