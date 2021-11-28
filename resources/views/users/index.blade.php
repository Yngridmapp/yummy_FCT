<!-- Listado de usuarios de la pagina, que solo se van a ver como usuario administrador -->
@extends('layouts.master')
@section('body')
<div class="container portfolio">
    <div class="row">
        <div class="col-md-12">
            <div class="heading">
                <a  class="btn color4 rounded-circle">

                </a>
                <a  class="btn color3 rounded-circle">

                </a>
                <a  class="btn color2 rounded-circle">

                </a>
            </div>
        </div>
    </div>
    <div class="bio-info">
        <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead class="bg-topbar text-light text-center color2">
                                <tr>
                                    <th scole="col">Usuario</th>
                                    <th scole="col">E-mail</th>
                                    <th scole="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($users as $user)
                                <tr>
                                    <!-- <th scope="row"></th> -->
                                    <td>{{$user->name}} {{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{route('users.show',$user)}}" class="btn color4 rounded-circle mr-2"><i class="fas fa-eye"></i></a>
                                            <form class="form" action="{{route('users.destroy',$user)}}" method="post">
                                                <button type="submit" class="btn color3 icon rounded-circle"><i class="fas fa-trash-alt"></i></button>
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
    </div>
</div>

@endsection