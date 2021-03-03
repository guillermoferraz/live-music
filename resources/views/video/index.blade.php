@extends('layouts.app')

<div class="position-absolute mt-5 d-flex" style="top: 10px; right:5px; z-index:1;">
{{$video->links()}}
</div>

@section('content')


<div id="video_create">
@if(count($errors)>0)
        <div class="alert alert-danger col-md-7 float-right border border-danger alert-dismissible m-4" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error  }}</li>
            @endforeach
        </ul>
        
        </div>
    @endif



@if(Session::has('msg_video'))

<div class="alert alert-success border-success alert-dismissible col-md-8 float-right m-4" role="alert">
    {{Session::get('msg_video') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif


    <div class="container col-md-9 float-right mt-1">
            @foreach($video  as $video)
                @if($video->id >=0)
            <table class="table table-dark">
                <thead class="thead-dark">
                    
                    <tr>
                        <th><code>Name</code></th>
                        <th class="text-center"><code>Video</code> </th>

                        <th>
                            <form action="{{url ('/video/'.$video->id)}}" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                            <input class="fas fa-trash-alt text-light float-right m-1" type="submit" onclick="return confirm('Delete this video?')" style=" cursor: pointer; text-decoration: none" id="v_down" alt="" title="Delete"></input>
                            </form>                    

                            <a href="{{url('/video/'.$video->id.'/edit')}}" class="fas fa-edit text-light float-right m-1" style=" cursor: pointer; text-decoration: none" id="v_up" alt=""  title="Edit"></a>
                        </th>
                    </tr>
                    
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <strong class="my-auto">{{$video->video_name}}</strong>
                        </td>
            
                        <td>
                            <iframe class="float-right" src="{{$video->video_link}}" width="260" height="155" frameborder="0" allowfullscreen></iframe> 
                        </td>
                        <td></td>
                        
                    </tr>
                </tbody>
                
                    
             </table>  
                @endif
             @endforeach
             
             
            
    </div>
    
</div>
@include('profile.menu')


@endsection
