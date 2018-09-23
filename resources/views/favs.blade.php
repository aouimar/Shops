<?php
$favs = $_POST['favs'];
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
                <button class="btn btn-primary btn-xs" onclick="actOnLike({{$prefered->id}});">
                  <i id="like" class="fa fa-thumbs-up"></i>
                </button>
                <button class="btn btn-primary btn-xs" onclick="actOnDislike({{$prefered->id}});">
                  <i id="like" class="fa fa-thumbs-down"></i>
                </button>
            </p>
          </div>
        </div>
      </div>
    @endforeach
  </div>