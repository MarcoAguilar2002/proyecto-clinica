@extends('layouts.dashboard')

@section('title', 'Detalles del doctor')

@section('content')
<div class="d-flex justify-content-center align-items-center p-5 mt-5">
    <div class="col-md-5">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos Registrados</h3>
            </div>
            <div class="card-body">
                <!-- Contenido de la tarjeta -->
                <h5 style="font-weight: bold">Nombres:</h5>
                <p>{{$doctor->nombres}}</p>
                <h5 style="font-weight: bold">Apellidos:</h5>
                <p>{{$doctor->apellidos}}</p>
                <h5 style="font-weight: bold">Celular:</h5>
                <p>{{$doctor->celular}}</p>
                <h5 style="font-weight: bold">Codigo Colegiado:</h5>
                <p>{{$doctor->codigo_colegiado}}</p>
                <h5 style="font-weight: bold">Especialidad:</h5>
                <p>{{$doctor->especialidad}}</p>
                <h5 style="font-weight: bold">Correo:</h5>
                <p>{{$doctor->user->email}}</p>
                
                <div class="text-center">
                    <button class="btn btn-secondary" onclick="window.history.back();">Volver</button>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
