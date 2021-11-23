@extends('layouts.master')
@section('body')
<div class="container portfolio text-left">
    <div class="row">
        <div class="col-md-12">
            <div class="heading">
                <a href="{{route('users.show', Auth::User()->id)}}" class="btn color4 rounded-circle">
                <i class="fas fa-eye"></i> 
                </a>
                <button type="button" class="btn color3 rounded-circle">
                    <!-- <i class="fas fa-star"></i> -->
                </button>
                <a href="{{route('users.edit', Auth::User()->id)}}" class="btn color2 rounded-circle">
                    <i class="fas fa-magic"></i>
                </a>
            </div>
        </div>
    </div>
    <form method="post" action="{{route('recipes.store')}}" enctype="multipart/form-data">
        @include('recipes._form')
        <button type="submit" class="btn" style="background-color:#ffb3b3;">Publicar</button>
    </form>
</div>
@endsection