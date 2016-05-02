@extends('layouts.app')

@section('content')
    @include('tblDocumentos.show_fields')

    <div class="form-group">
           <a href="{!! route('tblDocumentos.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
