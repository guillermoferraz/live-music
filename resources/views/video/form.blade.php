<div class="" id="v_form">
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

            
    <div>
        <input type="text" class="form-control d-none" name="video_id" id="video_id" value="{{Auth::user()->id}}" readonly>
        <input type="text" class="form-control d-none" placeholder="Enter your username" id="username" name="video_username" value="{{Auth::user()->name}}" readonly>
    </div>
    <div>
        <label for="video_name">Video name</label>
        <input type="text" class="form-control form-control-sm" placeholder="Enter the video name" id="video_name" name="video_name" value="{{isset($video->video_name)?$video->video_name: old('video_nam')}}">
    </div>
    <div>
        <label for="video_link">Video link</label>
        <input type="text" class="form-control form-control-sm"id="video_link" name="video_link" placeholder="Example:'https://www.youtube.com/embed/X2hO8FEUOsc'" value="{{isset($video->video_link)?$video->video_link: old('video_link')}}"> 
        <small>Replace in your link /watch?v= <code> for </code>/embed/ </small> 
        
    
    </div>
    <div class="mt-2">
        <input type="submit" class="btn btn-success btn-sm" value="{{$modo}}"></input>
        <a href="{{url('/video')}}" class="btn btn-info btn-sm text-light">Back</a>
    </div>
    
<!--<script>
    $(document).ready(function(){
        $('#v_up').hide();
        $('#v_form').hide();
    });
    $(document).on('click', '#v_down', function(){
        $('#v_form').show('slow');
        $('#v_down').hide('slow');
        $('#v_up').show('slow');
    });
    $(document).on('click', '#v_up', function(){
        $('#v_form').hide('slow');
        $('#v_down').show('slow');
        $('#v_up').hide('slow');
    });

</script> -->

</div>
