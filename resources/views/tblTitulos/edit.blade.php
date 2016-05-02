@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit TblTitulos</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblTitulos, ['route' => ['tblTitulos.update', $tblTitulos->id], 'method' => 'patch']) !!}

            @include('tblTitulos.fields')

            {!! Form::close() !!}
        </div>
@endsection