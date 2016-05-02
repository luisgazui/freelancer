@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit TblDocumentos</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblDocumentos, ['route' => ['tblDocumentos.update', $tblDocumentos->id], 'method' => 'patch']) !!}

            @include('tblDocumentos.fields')

            {!! Form::close() !!}
        </div>
@endsection