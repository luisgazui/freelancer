@extends('layouts.app')

@section('content')
    @include('paises.show_fields')

    <div class="form-group">
           <a href="{!! route('paises.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
