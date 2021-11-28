<!-- LISTADO BUSQUEDA -->
@extends('layouts.master')
@section('body')

<!-- Carousel wrapper -->
<div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel">
    <h3 class="oblique">Resultados para: {{$search}}</h3>
    <!-- Inner -->
    <div class="carousel-inner py-4">
        <!-- Single item -->
        <div class="carousel-item active">
            <div class="container">
                <div class="row">
                    <!-- card1 -->
                    @foreach($recipe as $rec)
                    <div class="col-lg-4 mt-3">
                        <div class="card">
                            <!--
                            <i class="fas fa-heart"></i> relleno
                              <i class="far fa-heart"></i>-->
                            <img src="{{$rec->pic_recipes == null ? asset('img/food/default.jpg') : asset('img/food/'.$rec->pic_recipes)}}" class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title">{{$rec->title}}</h5>

                                <!--BOTONES PARA EL CRUD DE RECETA-->
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('recipes.show',$rec)}}" class="btn color4 rounded-circle mr-2"><i class="fas fa-eye"></i></a>


                                    <!-- Solo el administrador puede ver estos botones-->
                                    @auth

                                    @if(Auth::user()->rol_id == 1)


                                    <a href="{{route('recipes.edit',$rec)}}" class="btn color2 rounded-circle mr-2"><i class="fas fa-magic"></i></a>
                                    <form class="form" action="{{route('recipes.destroy',$rec)}}" method="post">
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

                    {{$recipe->links()}}
                </div>
            </div>
        </div>

    </div>
    <!-- Inner -->
    
    @endsection