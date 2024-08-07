@extends('layouts.dashboard')

@section('title', 'Detalles consultorio')

@section('content')
    <div class="container">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>

                <div class="card-body col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Consultorio</label>
                                    <p>{{$consultorio->nombre}}</p>
                                    
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <div class="form group">
                                        <label for="">Ubicación</label>
                                        <p>{{$consultorio->ubicacion}}</p>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Capacidad</label>
                                    <p>{{$consultorio->capacidad}}</p>
                                    
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Teléfono</label>
                                    <p>{{$consultorio->telefono}}</p>
                                    
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Especialidad</label>
                                    <p>{{$consultorio->especialidad}}</p>
                                    
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <div class="form group">
                                        <label for="">Estado</label>
                                        <p>{{$consultorio->estado}}</p>
                                        
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row item-aling-center justify-content">
                            <a href="{{ route('admin.consultorios.index') }}" class="btn btn-secondary ">Volver</a>
                        </div>
                </div>

            </div>

        </div>
    </div>

@endsection
