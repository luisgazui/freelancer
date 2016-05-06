@extends('layouts.app')

@section('content')
    @include('tblTipoInstrumentos.show_fields')

    <div class="form-group">
           <a href="{!! route('tblTipoInstrumentos.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
