@extends('layouts.master')
@section('body')
@include('portada._search')
<div class="container my-4">




  <!--Carousel Wrapper-->

  <!--Controls-->
  <hr class="mt-5">
  <div class="controls-top d-flex">
    <a class="btn-floating mr-auto novedades " href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left size textColor3"></i></a>
    <h1 class="text-center mr-auto oblique">Ultimas recetas</h1>
    <a class="btn-floating novedades " href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right size textColor3"></i></a>
  </div>
  <hr class="mb-5" />
  <!--/.Controls-->

  <!--Indicators-->
  <!-- <ol class="carousel-indicators">
    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
    <li data-target="#multi-item-example" data-slide-to="1"></li>

  </ol> -->
  <!--/.Indicators-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">
      @for($i = 0; $i < sizeof($recipes);$i++)
      @if($i<3)
      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top" src="{{$recipes[$i]->pic_recipes == null ? asset('img/food/default.jpg') : asset('img/food/'.$recipes[$i]->pic_recipes)}}" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">{{$recipes[$i]->title}}</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a href="{{route('recipes.show',$recipes)}}" class="btn color4 rounded-circle"><i class="fas fa-eye"></i></a>
          </div>
        </div>
      </div>
      @endif
      @endfor
    </div>
    <!--/.First slide-->
    <!--second slide-->
    <!--/.second slide-->

  </div>
  <!--/.Slides-->


  <!--/.Carousel Wrapper-->
</div>

@endsection