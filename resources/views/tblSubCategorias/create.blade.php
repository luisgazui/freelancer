@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New TblSubCategorias</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'tblSubCategorias.store']) !!}

            @include('tblSubCategorias.fields')

        {!! Form::close() !!}
    </div>
@endsection