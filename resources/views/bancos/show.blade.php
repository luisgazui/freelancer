@extends('layouts.app')

@section('content')
    @include('bancos.show_fields')

    <div class="form-group">
           <a href="{!! route('bancos.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
