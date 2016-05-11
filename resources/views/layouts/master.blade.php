<!DOCTYPE html>
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <meta name="viewport" content="width=device-width">
    <title>Prego - Project Management App</title>
    <meta name="description" content="Prego is a project management app built for learning purposes">

    <!--  
    <script src="//use.typekit.net/udt8boc.js"></script>
     -->
    <script>try{Typekit.load();}catch(e){}</script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="{{ asset('js/jquery.atwho.js') }}"></script>
    <script src="{{ asset('js/jquery.caret.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/jquery.atwho.min.css') }}">
    @include('mentions::assets')
</head>
<body>
    <div class="container"> 
        @yield('content')
    </div>
</body>
</html>