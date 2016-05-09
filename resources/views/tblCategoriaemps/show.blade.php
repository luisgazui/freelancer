@extends('layouts.app')

@section('content')
    @include('tblCategoriaemps.show_fields')

    <div class="form-group">
           <a href="{!! route('tblCategoriaemps.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
