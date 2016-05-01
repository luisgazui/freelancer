@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit categorias</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($categorias, ['route' => ['categorias.update', $categorias->id], 'method' => 'patch']) !!}

            @include('categorias.fields')

            {!! Form::close() !!}
        </div>
@endsection