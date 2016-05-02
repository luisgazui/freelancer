@extends('layouts.app')

@section('content')
        <h1 class="pull-left">TblSanciones</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tblSanciones.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('tblSanciones.table')
        
@endsection