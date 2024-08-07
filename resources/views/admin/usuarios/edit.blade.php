@extends('layouts.dashboard')

@section('title', 'Editar Usuario')

@section('content')
    <div class="container">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Cambie los valores del formulario</h3>

                </div>

                <div class="card-body">
                    <form action="{{route('admin.usuarios.update',$usuario->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{$usuario->name}}" >
                            
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @error('name')
                            <small style="color:red">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" value="{{$usuario->email}}" placeholder="Email" >
                            
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>

                            @error('email')
                            <small style="color:red">{{$message}}</small>
                            @enderror
                            
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" value="{{old('password')}}" placeholder="Contraseña" aria-autocomplete="list" >
                            
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Repetir contraseña">
                            
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a href="{{route('admin.usuarios.index')}}" class="btn btn-secondary ">Cancelar</a>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection
