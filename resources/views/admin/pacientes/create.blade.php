@extends('layouts.dashboard')

@section('title', 'Crear Paciente')

@section('content')
    <div class="container">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Complete el formulario</h3>
                </div>

                <div class="card-body col-md-12">
                    <form action="{{ route('admin.pacientes.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3">
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
                            </div>

                            <div class="col-md-4">
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
                            </div>

                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="dni" class="form-control" placeholder="DNI"
                                        value="{{ old('dni') }}">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('dni')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <input type="date" name="fecha_nacimiento" class="form-control"
                                        placeholder="Fecha nacimiento" value="{{ old('fecha_nacimiento') }}">


                                    @error('fecha_nacimiento')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">

                                    <select name="genero" id="" class="form-control">
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="bi bi-gender-ambiguous"></span>
                                        </div>
                                    </div>

                                    @error('genero')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="celular" class="form-control" placeholder="Celular"
                                        value="{{ old('celular') }}">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('celular')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="direccion" class="form-control" placeholder="Dirección"
                                        value="{{ old('direccion') }}">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('direccion')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="correo" class="form-control" placeholder="Correo"
                                        value="{{ old('correo') }}">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('correo')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="grupo_sanguineo" class="form-control"
                                        placeholder="grupo_sanguineo" value="{{ old('grupo_sanguineo') }}">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('grupo_sanguineo')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="nro_seguro" class="form-control"
                                        placeholder="N° de seguro" value="{{ old('nro_seguro') }}">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('nro_seguro')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group mb-3">
                                    <textarea name="observaciones" class="form-control" placeholder="Observaciones">{{ old('observaciones') }}</textarea>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row item-aling-center justify-content">
                            <a href="{{ route('admin.pacientes.index') }}" class="btn btn-secondary ">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection
