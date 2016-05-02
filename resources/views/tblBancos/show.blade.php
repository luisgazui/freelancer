@extends('layouts.app')

@section('content')
    @include('tblBancos.show_fields')

    <div class="form-group">
           <a href="{!! route('tblBancos.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
