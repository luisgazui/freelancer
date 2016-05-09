@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit tblCodpais</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblCodpais, ['route' => ['tblCodpais.update', $tblCodpais->id], 'method' => 'patch']) !!}

            @include('tblCodpais.fields')

            {!! Form::close() !!}
        </div>
@endsection