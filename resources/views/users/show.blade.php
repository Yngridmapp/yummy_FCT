@extends('layouts.master')
@section('body')
<div class="container portfolio">
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
    <div class="bio-info">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bio-image">
                            <img class="img" src="{{$user->selfie}}" alt="image" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bio-content">
                    <h1>Hi there, I'm {{$user->name}} {{$user->last_name}}</h1>
                    <h6>{{$user->description}}</h6>
                    <p>P.S I have no special talent, I'm just passionately curious ;)</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection