@extends('layouts.app')

@section('content')
    @include('tblTitulos.show_fields')

    <div class="form-group">
           <a href="{!! route('tblTitulos.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
