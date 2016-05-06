@extends('layouts.app')

@section('content')
    @include('tblEspecialidads.show_fields')

    <div class="form-group">
           <a href="{!! route('tblEspecialidads.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
