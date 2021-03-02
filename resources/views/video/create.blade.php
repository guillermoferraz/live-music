@extends('layouts.app')
@section('content')
@include('profile.menu')
<div class="contanier">

    <div class="card col-8 bg-dark text-light mx-auto" >    
        <div class="card-header">
            
          <!--  <a class="fas fa-chevron-down text-light float-right" style=" cursor: pointer; text-decoration: none" id="v_down" alt="" title="Show"></a>
            <a class="fas fa-chevron-up text-light float-right" style=" cursor: pointer; text-decoration: none" id="v_up" alt="" title="Hide"></a> -->

            <div class="card-title">
            Upload your video
            </div>
        </div>
        
        <form class="form-group" action="{{ url('/video')}}" method="post" enctype="multipart/form-data">
             @csrf
            
            @include('video.form', ['modo'=>'Upload'])
        </form>
    
    </div> 

</div>

@endsection

