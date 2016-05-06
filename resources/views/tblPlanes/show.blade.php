@extends('layouts.app')

@section('content')
    @include('tblPlanes.show_fields')

    <div class="form-group">
           <a href="{!! route('tblPlanes.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
