<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ config('app.name', 'Life-booknote') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/custom.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{url('/') }}/css/lang_{{ LaravelLocalization::getCurrentLocale() }}.css" />
</head>
<body>
   <div class="container"> <!-- Start container -->
    <!-- Include navbar -->
    @include('defaults._nav') 
    <!-- Yield to show the content of the section -->
    @yield('content') 
    <!-- Footer -->
   <footer id="footer" class=" bg-dark text-white p-4 mt-5 text-center">
        <p>{{ trans('terms.footer') }} {{date('Y')}}</p>
      </footer>
   </div> <!-- End container -->
</body>
</html>