@extends('layouts.app')

@section('content')
    @include('tblExperiencias.show_fields')

    <div class="form-group">
           <a href="{!! route('tblExperiencias.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
