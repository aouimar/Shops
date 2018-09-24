<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shops</title>
    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('js') 
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
    <!-- Custom styles for this template -->
    <link href="css/4-col-portfolio.css" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Shops') }}</title>

  </head>

  <body>
   
   @yield('header')
   @yield('navigation')
   @yield('List_shops')
   
  </body>
  
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Shops Website 2018</p>
    </div>
  </footer>
   

</html>
