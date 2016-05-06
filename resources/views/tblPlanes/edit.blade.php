@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit TblPlanes</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblPlanes, ['route' => ['tblPlanes.update', $tblPlanes->id], 'method' => 'patch']) !!}

            @include('tblPlanes.fields')

            {!! Form::close() !!}
        </div>
@endsection