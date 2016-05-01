@extends('layouts.app')

@section('content')
    @include('documentos.show_fields')

    <div class="form-group">
           <a href="{!! route('documentos.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
