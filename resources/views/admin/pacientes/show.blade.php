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
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres</label>
                                    <p>{{$paciente->nombres}}</p>
                                    
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <div class="form group">
                                        <label for="">Apellidos</label>
                                        <p>{{$paciente->apellidos}}</p>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">DNI</label>
                                    <p>{{$paciente->dni}}</p>
                                    
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Seguro</label>
                                    <p>{{$paciente->nro_seguro}}</p>
                                    
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Fecha de Nacimiento</label>
                                    <p>{{$paciente->fecha_nacimiento}}</p>
                                    
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <div class="form group">
                                        <label for="">Género</label>
                                        <p>{{$paciente->genero}}</p>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Celular</label>
                                    <p>{{$paciente->celular}}</p>
                                    
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Correo</label>
                                    <p>{{$paciente->correo}}</p>
                                    
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Dirección</label>
                                    <p>{{$paciente->direccion}}</p>
                                    
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <div class="form group">
                                        <label for="">Grupo sanguineo</label>
                                        <p>{{$paciente->grupo_sanguineo}}</p>
                                        
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Observaciones</label>
                                    <p>{{ $paciente->observaciones }}</p>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row item-aling-center justify-content">
                            <a href="{{ route('admin.pacientes.index') }}" class="btn btn-secondary ">Volver</a>
                        </div>
                </div>

            </div>

        </div>
    </div>

@endsection
