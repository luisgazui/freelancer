@extends('layouts.app')

@section('content')
    @include('experiencias.show_fields')

    <div class="form-group">
           <a href="{!! route('experiencias.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
