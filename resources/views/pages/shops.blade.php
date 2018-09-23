@extends('layouts.index')

@section('js')
    <script>
      
        var refreshFavs = function(){
            setTimeout(function(){
              $( "#favs-row" ).load( "shops #favs-row");
            }, 5);
            setTimeout(function(){
              $( "#shops-row" ).load( "shops #shops-row");
            }, 5);
          };

        var actOnLike = function (shopid) {
            axios.post('/shops/' + shopid + '/like');
             setTimeout(function(){
              $( "#shops-row" ).load( "shops #shops-row");
            }, 5);
        };
        var actOnRemove = function (shopid) {
            axios.post('/shops/' + shopid + '/remove');
             setTimeout(function(){
              $( "#favs-row" ).load( "shops #favs-row");
            }, 5);
        };
        var actOnDislike = function (shopid) {
            axios.post('/shops/' + shopid + '/dislike');
            setTimeout(function(){
              $( "#shops-row" ).load( "shops #shops-row");
            }, 5);
        };

    </script>
@endsection

@section('header')
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Shops') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
@endsection

@section('shops')
  <div class="row" id="shops-row">
    @foreach ($shops as $shop)
      <div class="col-lg-3 col-md-4 col-sm-4 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title"> <a>{{$shop->name}}</a></h4>
            <h5>At distance {{$format_distance($shop)}}</h5>
            <p class="card-text">
              @csrf
                <button id="btn-like" class="btn btn-success btn-xs" onclick="actOnLike({{$shop->id}});">
                  <i id="like" class="fa fa-thumbs-up"></i>
                </button>
                <button id="btn-dislike" class="btn btn-warning btn-xs" onclick="actOnDislike({{$shop->id}});">
                  <i id="dislike" class="fa fa-thumbs-down"></i>
                </button>
            </p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
      <!-- /.row -->
 
@section('favs')
      <!-- Page Heading -->
  <div class="row" id="favs-row">
    @foreach ($favs as $prefered)
      <div class="col-lg-3 col-md-4 col-sm-4 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
          <div class="card-body">
            <h4 class="card-title"> <a>{{$prefered->name}}</a></h4>
            <h5>At distance {{$format_distance($prefered)}}</h5>
            <p class="card-text">
              @csrf
                <button class="btn btn-danger btn-xs" onclick="actOnRemove({{$prefered->id}});">
                  <i id="remove" class="fa fa-trash-alt"></i>
                </button>
            </p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection  


@section('pagination')
      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
<!-- /.container -->
@endsection

@section('List_shops')
<div class="container">
  <h2 calss="my-4">Shops List</h2>
  <br>
  <!-- Nav pills -->
  <ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" onclick="refreshFavs();" data-toggle="pill" href="#nearby">Nearby Shops</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" onclick="refreshFavs();" data-toggle="pill" href="#prefered">Prefered Shops</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="nearby" class="container tab-pane active"><br>
      @yield('shops')
    </div>
    <div id="prefered" class="container tab-pane fade"><br>
      @yield('favs')
    </div>
  </div>
</div>
@endsection


