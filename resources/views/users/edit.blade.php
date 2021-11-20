@extends('layouts.master')
@section('body')
<div class="container portfolio">
    <div class="row">
        <div class="col-md-12">
            <div class="heading">
                <button type="button" class="btn color4 rounded-circle" data-mdb-ripple-color="dark">
                    <!-- <i class="fas fa-star"></i> -->
                </button>
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
                    <form method="post" action="{{route('users.update',Auth::User()->id)}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            {{-- {{dd($user->name)}} --}}
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$user->name) }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="last_name">Apellidos</label>
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name',$user->last_name) }}" required autocomplete="last_name" autofocus>

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Correo:</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion:</label>
                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description',$user->description) }}" required autocomplete="description">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                         <div class="form-group">
                        <label for="selfie">Agregar imagen:</label>
                        <input type="file" name="selfie" id="selfie" class="form-control" value="{{ old('selfie', $user->selfie) }}"/>
                        @error('selfie')
                        <small class="alert alert-danger">{{ $message }}</small>
                        @enderror
                        </div> 
                <button type="submit" class="btn color2" >Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            ClassicEditor.create($('#description').get()[0])
        })
    </script>
@endsection
