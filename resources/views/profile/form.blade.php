
<div class=""> 
    
    <div>
        <input type="text" class="form-control" name="user_id" id="user_id" value="{{Auth::user()->id}}" readonly>
        <br>
        <label for="username">Username</label>
        <input type="text" class="form-control" placeholder="Enter your username" id="username" name="username" value="{{Auth::user()->name}}" readonly>
    </div>
    <div>
        <label for="alias">Alias</label>
        <input type="text" class="form-control" placeholder="Enter your alias" id="alias" name="alias" value="{{isset($profile->alias)?$profile->alias: ''}}">
    </div>
    <div>
        <label for="image">Select your image</label>
        <input type="file" class="form-control-file"id="image" name="image">
        
        
    
    </div>
    <div class="mt-2">
        <input type="submit" class="btn btn-success" value="{{$modo}}"></input>
        
    </div>
    

</div>
