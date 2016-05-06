@extends('layouts.app')

@section('content')
    @include('tblTipousuarios.show_fields')

    <div class="form-group">
           <a href="{!! route('tblTipousuarios.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
