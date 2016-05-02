@extends('layouts.app')

@section('content')
    @include('tblDuracions.show_fields')

    <div class="form-group">
           <a href="{!! route('tblDuracions.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
