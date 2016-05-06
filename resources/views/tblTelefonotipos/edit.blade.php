@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit TblTelefonotipo</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblTelefonotipo, ['route' => ['tblTelefonotipos.update', $tblTelefonotipo->id], 'method' => 'patch']) !!}

            @include('tblTelefonotipos.fields')

            {!! Form::close() !!}
        </div>
@endsection