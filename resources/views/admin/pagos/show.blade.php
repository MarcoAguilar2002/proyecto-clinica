@extends('layouts.dashboard')

@section('title', 'Ver Pago')

@section('content')

    <div class="container">
        <div class="col-md-9">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.historials.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="fechaVisita">Paciente</label>
                            <p>{{$pago->paciente->nombres." ".$pago->paciente->apellidos}}</p>
                        </div>

                        <div class="form-group mb-3">
                            <label for="fechaVisita">Doctor</label>
                            <p>{{$pago->doctor->apellidos.'-'.$pago->doctor->especialidad}}</p>

                        </div>

                        <div class="form-group mb-3">
                            <label for="detalle">Fecha de pago</label>
                            <p>{{$pago->fecha_pago}}</p>
                        </div>

                        <div class="form-group mb-3">
                            <label for="detalle">Monto</label>
                            <p>{{$pago->monto}}</p>
                        </div>

                        <div class="form-group mb-3">
                            <label for="detalle">Descripción</label>
                            <p>{{$pago->descripcion}}</p>
                        </div>

                        <div class="row text-center">
                            <div class="col">
                                <a href="{{ route('admin.pagos.index') }}" class="btn btn-secondary">Salir</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
