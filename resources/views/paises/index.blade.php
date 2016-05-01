@extends('layouts.app')

@section('content')
        <h1 class="pull-left">paises</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('paises.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('paises.table')
        
@endsection