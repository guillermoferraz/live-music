<div class="" id="v_form"> 
    <div>
        <input type="text" class="form-control d-none" name="user_id" id="user_id" value="{{Auth::user()->id}}" readonly>
        <input type="text" class="form-control d-none" placeholder="Enter your username" id="username" name="username" value="{{Auth::user()->name}}" readonly>
    </div>
    <div>
        <label for="video_name">Video name</label>
        <input type="text" class="form-control form-control-sm" placeholder="Enter the video name" id="video_name" name="video_name" value="">
    </div>
    <div>
        <label for="video_link">Video link</label>
        <input type="text" class="form-control form-control-sm"id="video_link" name="video_link" placeholder="https://www.youtube.com/embed/X2hO8FEUOsc">
        
        
    
    </div>
    <div class="mt-2">
        <input type="submit" class="btn btn-success btn-sm" value="{{$modo}}"></input>
        
    </div>
    
<script>
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

</script>

</div>
