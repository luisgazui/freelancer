@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit tblCategoriaemp</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($tblCategoriaemp, ['route' => ['tblCategoriaemps.update', $tblCategoriaemp->id], 'method' => 'patch']) !!}

            @include('tblCategoriaemps.fields')

            {!! Form::close() !!}
        </div>
@endsection