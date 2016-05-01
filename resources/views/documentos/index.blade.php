@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Documentos</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('documentos.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('documentos.table')
        
@endsection