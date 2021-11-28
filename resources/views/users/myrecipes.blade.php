@extends('layouts.master')
@section('body')
@if(count($recipes) == 0)
<!-- Si no tiene recetas, muestra el aviso -->
<div class="container">
    <div class="p-5 rounded">
        <h1 class="transparenciaError"><strong>¡Vaya,{{$user->name}}!.No has publicado ninguna receta aun.</strong></h1>
        <br>
        <img src="{{asset('/img/errors/oh oh.png')}}" alt="" style="width: 256px; height:256px;">
    </div>
</div>

@else

<!-- Carousel wrapper -->
<div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel">
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
                            <!-- Si la receta no tiene imagen, aparecerá con una por defecto -->
                            <img src="{{$recipe->pic_recipes == null ? asset('img/food/default.jpg') : asset('img/food/'.$recipe->pic_recipes)}}" class="card-img-top img" alt="..." />
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

                    
                </div>
                {{$recipes->links()}}
            </div>
        </div>

    </div>
    <!-- Inner -->
    @endif
    @endsection