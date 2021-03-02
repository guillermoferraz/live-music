@extends('layouts.app')
@section('content')

@if(Session::has('message'))
{{ Session::get('message') }}

@endif
@foreach ($profile as $data)

<div class="container col-3 bg-dark float-left text-center p-2 rounded" height="100%">
    <a href="{{ url('/profile/'.$data->id.'/edit') }} "class="fas fa-cog float-right text-light " title="Edit profile"></a>
    <div class=" mx-auto mt-3">
        @if(isset($data->image))
        <img src="{{asset('storage'.'/'.$data->image)}}" class="rounded-circle img-fluid  " width="150">
        @endif
    </div>
    <div class="mt-2">
        <strong class="text-success font-weight-bolder">{{$data->alias}}</strong>
    </div>
    <div class="mt-3">
        <div class="font-weight-bold">
            <button class="btn btn-danger btn-block">Upload Radio</button>
            <button class="btn btn-danger btn-block">My Radios</button>
            <a href="{{ url('/video') }}" alt="" class="btn btn-danger btn-block">My Videos</a>
            <a href="{{ url('/') }}" alt="" class="btn btn-danger btn-block">All music</a>
            <a href="https://www.youtube.com"   target="_blank" class="btn btn-danger btn-block">Go to Youtube</a>


        </div>    
    </div>
    

</div>
@endsection

<div> 
</div>

@endforeach

