<!-- LISTADO RECETAS DE TODA LA APLICACION -->
@extends('layouts.master')
@section('body')
@if(count($recipes) == 0)
<!-- Si no tiene recetas, muestra el aviso -->
<div class="container">
    <div class="p-5 rounded">
        <h1 class="transparenciaError"><strong>¡Vaya!.No se ha publicado ninguna receta en esta categoria.</strong></h1>
        <br>
        <img src="{{asset('/img/errors/sad.png')}}" alt="" style="width: 256px; height:256px;">
    </div>
</div>

@else

<!-- Carousel wrapper -->
<div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel">
    <!-- Controls -->
    <!-- 
    --FUNCIONA MEJOR PAGINATOR--
    <div class="d-flex justify-content-center mb-4">
        <button class="carousel-control-prev position-relative color3" type="button" data-mdb-target="#carouselMultiItemExample" data-mdb-slide="prev">
            <i class="fas fa-chevron-left"></i> 
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next position-relative color3" type="button" data-mdb-target="#carouselMultiItemExample" data-mdb-slide="next">
             <i class="fas fa-chevron-right"></i>
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> -->
    <!-- Inner -->
    <div class="carousel-inner py-4">
        <!-- Single item -->
        <div class="carousel-item active">
            <div class="container">
                <div class="row">
                    <!-- card1 -->
                    @foreach($recipes as $recipe)

                    <div class="col-lg-4 mt-3">
                        <div class="card">
                            <!--
                            <i class="fas fa-heart"></i> relleno
                              <i class="far fa-heart"></i>-->
                            <img src="{{$recipe->pic_recipes == null ? asset('img/food/default.jpg') : asset('img/food/'.$recipe->pic_recipes)}}" class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title">{{$recipe->title}}</h5>

                                <!--BOTONES PARA EL CRUD DE RECETA-->
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('recipes.show',$recipe)}}" class="btn color4 rounded-circle mr-2"><i class="fas fa-eye"></i></a>


                                    <!-- Solo el administrador puede ver estos botones-->
                                    @auth

                                    @if(Auth::user()->rol_id == 1)


                                    <a href="{{route('recipes.edit',$recipe)}}" class="btn color2 rounded-circle mr-2"><i class="fas fa-magic"></i></a>
                                    <form class="form" action="{{route('recipes.destroy',$recipe)}}" method="post">
                                        <button type="submit" class="btn color3 icon rounded-circle"><i class="fas fa-trash-alt"></i></button>
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                    @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{$recipes->links()}}
                </div>
            </div>
        </div>

    </div>
    <!-- Inner -->
    @endif
    @endsection