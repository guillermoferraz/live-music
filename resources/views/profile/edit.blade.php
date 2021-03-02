@extends('layouts.app')
@section('content')
<div class="contanier row mx-auto col-7 mt-5 bg-dark">
    <div class="card col-md-5 m-3  bg-secondary text-light">
        <div class="card-header">
            <div class="card-title">
                Create your profle
            </div>
        </div>
        <form class="form-group" action="{{ url('/profile/'.$profile->id)}}" method="post" enctype="multipart/form-data">
             @csrf
            {{ method_field('PATCH') }}
            @include('profile.form', ['modo'=>'Edit'])
                           
        
        </form>
    </div> 
    <div class="card col-md-6  p-0 bg-dark my-auto rounded-circle">
        @if(isset($profile->image))
        <img src="{{ asset('storage').'/'.$profile->image }}" class=" img-fluid rounded-circle p-4" >
        @endif
    </div>
</div>
@endsection
