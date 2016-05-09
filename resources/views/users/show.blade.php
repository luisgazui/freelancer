@extends('layouts.app')

@section('content')
    @include('users.show_fields')

    <div class="form-group">
           <a href="{!! route('register.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
