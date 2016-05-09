@extends('layouts.app')

@section('content')
    @include('tblCodpais.show_fields')

    <div class="form-group">
           <a href="{!! route('tblCodpais.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
