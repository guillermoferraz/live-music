@extends('layouts.app')
@section('content')

@if(Session::has('message'))
{{ Session::get('message') }}

@endif
@foreach ($profile as $data)

@include('profile.menu')


<div>
  <div class="container col-md-8 float-right mt-1">
            @foreach($allData  as $all)
                @if($all->id >=0)
            <table class="table table-dark">
                <thead class="thead-dark">
                    
                    <tr>
                        <th><code>Name</code></th>
                        <th class="text-center"><code>Video</code> </th>

                    </tr>
                    
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <strong class="my-auto">{{$all->video_name}}</strong>
                            <br>
                            <code>{{$all->video_username}}</code>
                        </td>
            
                        <td>
                            <iframe class="float-right" src="{{$all->video_link}}" width="260" height="155" frameborder="0" allowfullscreen></iframe> 
                        </td>
                        
                        
                    </tr>
                    
                </tbody>
                @endif 
                @endforeach 
                @endforeach  
                   
                </table>  
            
         </div> 
    </div>   
</div>
@endsection
