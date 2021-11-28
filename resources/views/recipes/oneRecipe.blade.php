@extends('layouts.master')
@section('body')
    <div class="container portfolio">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <a href="" class="btn color4 rounded-circle">

                    </a>
                    <button type="button" class="btn color3 rounded-circle">
                    </button>
                    <a href="" class="btn color2 rounded-circle"></a>
                </div>
            </div>
        </div>
        <div class="bio-info">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bio-image">
                                <img class="img"
                                    src="{{ $recipe->pic_recipes == null ? asset('img/food/default.jpg') : asset('img/food/' . $recipe->pic_recipes) }}"
                                    alt="image" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bio-content">
                        <h1>{{ $recipe->title }}</h1>
                        <p>Hecho por: <a href="{{route('users.show',$recipe->user)}}">{{$recipe->user->name}}</a></p>
                        <p>{{ $recipe->ingredient }}</p>
                        <p>{{ $recipe->preparation }}</p>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
