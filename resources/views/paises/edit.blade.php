@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit paises</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($paises, ['route' => ['paises.update', $paises->id], 'method' => 'patch']) !!}

            @include('paises.fields')

            {!! Form::close() !!}
        </div>
@endsection