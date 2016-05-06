@extends('layouts.app')

@section('content')
    @include('tblStatusproyectos.show_fields')

    <div class="form-group">
           <a href="{!! route('tblStatusproyectos.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
