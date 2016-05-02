@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit TblSubCategorias</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblSubCategorias, ['route' => ['tblSubCategorias.update', $tblSubCategorias->id], 'method' => 'patch']) !!}

            @include('tblSubCategorias.fields')

            {!! Form::close() !!}
        </div>
@endsection