@extends('layouts.app')

@section('content')
    @include('tblCategorias.show_fields')

    <div class="form-group">
           <a href="{!! route('tblCategorias.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
