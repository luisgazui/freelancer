@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit TblPalabras</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblPalabras, ['route' => ['tblPalabras.update', $tblPalabras->id], 'method' => 'patch']) !!}

            @include('tblPalabras.fields')

            {!! Form::close() !!}
        </div>
@endsection