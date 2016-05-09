@extends('layouts.app')

@section('content')
        <h1 class="pull-left">tblCategoriaemps</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tblCategoriaemps.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('tblCategoriaemps.table')
        
@endsection