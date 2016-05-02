@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit TblCategorias</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblCategorias, ['route' => ['tblCategorias.update', $tblCategorias->id], 'method' => 'patch']) !!}

            @include('tblCategorias.fields')

            {!! Form::close() !!}
        </div>
@endsection