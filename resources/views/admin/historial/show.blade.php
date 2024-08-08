@extends('layouts.dashboard')

@section('title', 'Ver Historial')

@section('content')

    <div class="container">
        <div class="col-md-9">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos Registrados</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.historials.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="fechaVisita">Paciente</label>
                            <p>{{$historial->paciente->nombres." ".$historial->paciente->apellidos}}</p>
                        </div>

                        <div class="form-group mb-3">
                            <label for="fechaVisita">Fecha de visita</label>
                            <p>{{$historial->fechaVisita}}</p>

                        </div>

                        <div class="form-group mb-3">
                            <label for="detalle">Descripción de la cita</label>
                            <p>{!!\Illuminate\Support\Str::limit($historial->detalle,100,'...')!!}</p>
                        </div>

                        

                    

                        <div class="row text-center">
                            <div class="col">
                                <a href="{{ route('admin.historials.index') }}" class="btn btn-secondary">Salir</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
