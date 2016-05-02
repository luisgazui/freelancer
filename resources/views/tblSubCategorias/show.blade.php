@extends('layouts.app')

@section('content')
    @include('tblSubCategorias.show_fields')

    <div class="form-group">
           <a href="{!! route('tblSubCategorias.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
