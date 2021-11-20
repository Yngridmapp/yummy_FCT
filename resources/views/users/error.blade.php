@extends('layouts.master')
@section('body')
<div class="bg-light p-5 rounded">
    <h1 class="transparenciaError"><strong>Vaya!, No tenemos ninguna receta en {{$categorias[$catId-1]->categoria}}.</strong></h1>
    <br>
    <img src="{{asset('/img/errors/oh oh.png')}}" alt="" style="width: 256px; height:256px;">
</div>
@endsection