@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit TblPaises</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblPaises, ['route' => ['tblPaises.update', $tblPaises->id], 'method' => 'patch']) !!}

            @include('tblPaises.fields')

            {!! Form::close() !!}
        </div>
@endsection