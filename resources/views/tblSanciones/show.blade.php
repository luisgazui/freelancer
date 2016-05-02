@extends('layouts.app')

@section('content')
    @include('tblSanciones.show_fields')

    <div class="form-group">
           <a href="{!! route('tblSanciones.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
