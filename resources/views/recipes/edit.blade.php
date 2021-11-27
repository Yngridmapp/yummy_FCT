@extends('layouts.master')
@section('body')
<div class="container portfolio text-left">
    <form method="post" action="{{route('recipes.update',$recipe)}}" enctype="multipart/form-data">
    @method('PUT')
        @include('recipes._form')
        <button type="submit" class="btn" style="background-color:#ffb3b3;">Publicar</button>
    </form>
</div>
@endsection