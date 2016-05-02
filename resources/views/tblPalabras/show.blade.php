@extends('layouts.app')

@section('content')
    @include('tblPalabras.show_fields')

    <div class="form-group">
           <a href="{!! route('tblPalabras.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
