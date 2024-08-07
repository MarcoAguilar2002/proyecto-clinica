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
                    <form action="{{route('admin.secretarias.update',$secretaria->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="input-group mb-3 ">
                            <input type="text" name="nombres" class="form-control" placeholder="Nombres"
                                value="{{$secretaria->nombres }}">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @error('nombres')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="apellidos" class="form-control" placeholder="Apellidos"
                                value="{{$secretaria->apellidos }}">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @error('apellidos')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="dni" class="form-control" placeholder="DNI"
                                value="{{ $secretaria->dni}}">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="bi bi-person-vcard-fill"></span>
                                </div>
                            </div>
                            @error('dni')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="celular" class="form-control" placeholder="Celular"
                                value="{{ $secretaria->celular}}">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="bi bi-telephone-fill"></span>
                                </div>
                            </div>
                            @error('celular')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="date" name="fecha_nacimiento" class="form-control" placeholder=""
                                value="{{ $secretaria->fecha_nacimiento}}">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="bi bi-calendar-fill"></span>
                                </div>
                            </div>
                            @error('fecha_nacimiento')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="input-group mb-3">
                            <input type="text" name="direccion" class="form-control" placeholder="Direccion"
                                value="{{ $secretaria->direccion}}">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="bi bi-house-door-fill"></span>
                                </div>
                            </div>
                            @error('direccion')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" value="{{ $secretaria->user->email }}"
                                placeholder="Email">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" value="{{ old('password')}}"
                                placeholder="Contraseña" aria-autocomplete="list">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password_confirmation"
                                value="{{ old('password_confirmation')}}" placeholder="Repetir contraseña">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <a href="{{ route('admin.secretarias.index') }}" class="btn btn-secondary ">Cancelar</a>
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
