@extends('layouts.dashboard')

@section('title', 'Crear Doctor')

@section('content')
    
    <div class="container">
        <div class="col-md-9">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Complete el formulario</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.doctores.store') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3 ">
                            <input type="text" name="nombres" class="form-control" placeholder="Nombres"
                                value="{{ old('nombres') }}">

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
                                value="{{ old('apellidos') }}">

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
                            <input type="text" name="celular" class="form-control" placeholder="Celular"
                                value="{{ old('celular') }}">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="bi bi-person-vcard-fill"></span>
                                </div>
                            </div>
                            @error('celular')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="codigo_colegiado" class="form-control" placeholder="Codigo colegiado"
                                value="{{ old('codigo_colegiado') }}">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="bi bi-telephone-fill"></span>
                                </div>
                            </div>
                            @error('codigo_colegiado')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="especialidad" class="form-control" placeholder="Especialidad"
                                value="{{ old('especialidad') }}">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="bi bi-calendar-fill"></span>
                                </div>
                            </div>
                            @error('especialidad')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
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
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                                placeholder="Contraseña" aria-autocomplete="list">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password_confirmation"
                                value="{{ old('password_confirmation') }}" placeholder="Repetir contraseña">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password_confirmation')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col">
                                <a href="{{ route('admin.doctores.index') }}" class="btn btn-secondary ">Cancelar</a>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection
