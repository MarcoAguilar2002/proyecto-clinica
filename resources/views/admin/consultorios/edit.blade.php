@extends('layouts.dashboard')

@section('title', 'Editar Consultorio')

@section('content')
    <div class="container">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Complete el formulario</h3>
                </div>

                <div class="card-body col-md-12">
                    <form action="{{ route('admin.consultorios.update',$consultorio->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <input type="text" name="nombre" class="form-control" placeholder="Consultorio"
                                        value="{{ $consultorio->nombre }}">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('nombre')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <input type="text" name="ubicacion" class="form-control" placeholder="Ubicación"
                                        value="{{ $consultorio->ubicacion }}">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('ubicacion')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <input type="text" name="capacidad" class="form-control" placeholder="Capacidad"
                                        value="{{ $consultorio->capacidad }}">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('capacidad')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <input type="text" name="telefono" class="form-control" placeholder="Celular"
                                        value="{{ $consultorio->telefono }}">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('telefono')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <input type="text" name="especialidad" class="form-control"
                                        placeholder="Especialidad" value="{{ $consultorio->especialidad}}">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>

                                    @error('especialidad')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">

                                    <select name="estado" id="" class="form-control">
                                        <option value="Activo" @selected($consultorio->estado == 'Activo')>Activo</option>
                                        <option value="Inactivo" @selected($consultorio->estado == 'Inactivo')>Inactivo</option>
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

                        <div class="row item-aling-center justify-content">
                            <a href="{{ route('admin.consultorios.index') }}" class="btn btn-secondary ">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection
