@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New user</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                    <div class="panel-body">
        {!! Form::open(['route' => 'register.store']) !!}

            @include('users.fields')

        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection