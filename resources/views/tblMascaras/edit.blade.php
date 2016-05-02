@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit TblMascara</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblMascara, ['route' => ['tblMascaras.update', $tblMascara->id], 'method' => 'patch']) !!}

            @include('tblMascaras.fields')

            {!! Form::close() !!}
        </div>
@endsection