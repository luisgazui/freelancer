@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit TblDuracion</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblDuracion, ['route' => ['tblDuracions.update', $tblDuracion->id], 'method' => 'patch']) !!}

            @include('tblDuracions.fields')

            {!! Form::close() !!}
        </div>
@endsection