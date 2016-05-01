@extends('layouts.app')

@section('content')
    @include('tblPaises.show_fields')

    <div class="form-group">
           <a href="{!! route('tblPaises.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
