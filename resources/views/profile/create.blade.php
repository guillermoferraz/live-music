<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-dark">

<div class="contanier mt-5">
    <div class="card col-md-4 bg-secondary text-light mx-auto" >
        <div class="card-header">
            <div class="card-title">
                Create your profle
            </div>
        </div>
        
        <form class="form-group" action="{{ url('/profile')}}" method="post" enctype="multipart/form-data">
             @csrf
            
            @include('profile.form', ['modo'=>'Create'])
        </form>
    
    </div> 

</div>
</body>
</html>
