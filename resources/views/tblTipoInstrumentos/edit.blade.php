@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit TblTipoInstrumento</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblTipoInstrumento, ['route' => ['tblTipoInstrumentos.update', $tblTipoInstrumento->id], 'method' => 'patch']) !!}

            @include('tblTipoInstrumentos.fields')

            {!! Form::close() !!}
        </div>
@endsection