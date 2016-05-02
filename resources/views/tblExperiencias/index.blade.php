@extends('layouts.app')

@section('content')
        <h1 class="pull-left">TblExperiencias</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tblExperiencias.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('tblExperiencias.table')
        
@endsection