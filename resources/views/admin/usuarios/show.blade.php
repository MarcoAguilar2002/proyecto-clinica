@extends('layouts.dashboard')

@section('title', 'Detalles del usuario')

@section('content')
<div class="d-flex justify-content-center align-items-center p-5 mt-5">
    <div class="col-md-5">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos Registrados</h3>
            </div>
            <div class="card-body">
                <!-- Contenido de la tarjeta -->
                <h5 style="font-weight: bold">Nombre:</h5>
                <p>{{$usuario->name}}</p>
                <h5 style="font-weight: bold">Correo:</h5>
                <p>{{$usuario->email}}</p>
                <div class="text-center">
                    <button class="btn btn-secondary" onclick="window.history.back();">Volver</button>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
