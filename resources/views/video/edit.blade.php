video edit
<div class="contanier row mx-auto col-7 mt-5 bg-dark">
    <div class="card col-md-5 m-3  bg-secondary text-light">
        <div class="card-header">
            <div class="card-title">
                Edit your video
            </div>
        </div>
        <form class="form-group" action="" method="post" enctype="multipart/form-data">
             @csrf
            {{ method_field('PATCH') }}
            @include('video.form', ['modo'=>'Edit'])
                           
        
        </form>
    </div> 
    <div class="card col-md-6  p-0 bg-dark my-auto rounded-circle">
    
    </div>
</div>

