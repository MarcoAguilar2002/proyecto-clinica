@extends('layouts.dashboard')

@section('title', 'Detalles horario')

@section('content')
    <div class="container">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>

                <div class="card-body ">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form group">
                                    <label for="">Doctor</label>
                                    <p>{{$horario->doctor->nombres." ".$horario->doctor->apellidos}}</p>
                                    
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="input-group mb-3">
                                    <div class="form group">
                                        <label for="">Consultorio</label>
                                        <p>{{$horario->consultorio->nombre."-".$horario->consultorio->ubicacion}}</p>
                                        
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Dia</label>
                                    <p>{{$horario->dia}}</p>
                                    
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Hora de Inicio</label>
                                    <p>{{$horario->hora_inicio}}</p>
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Hora de Salida</label>
                                    <p>{{$horario->hora_fin}}</p>
                                    
                                </div>
                            </div>

                        </div>

                        <div class="row item-aling-center justify-content">
                            <a href="{{ route('admin.horarios.index') }}" class="btn btn-secondary ">Volver</a>
                        </div>
                </div>

            </div>

        </div>

        
    </div>

@endsection
