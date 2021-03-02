@extends('layouts.app')
@section('content')

@if(Session::has('message'))
{{ Session::get('message') }}

@endif
@foreach ($profile as $data)

@include('profile.menu')

@endsection
<div>
    
    
</div>
@endforeach

