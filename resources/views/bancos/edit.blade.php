@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit bancos</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($bancos, ['route' => ['bancos.update', $bancos->id], 'method' => 'patch']) !!}

            @include('bancos.fields')

            {!! Form::close() !!}
        </div>
@endsection