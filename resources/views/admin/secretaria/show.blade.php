@extends('layouts.dashboard')

@section('title', 'Detalles de la secretaria')

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
                <p>{{$secretaria->nombres}}</p>
                <h5 style="font-weight: bold">Apellidos:</h5>
                <p>{{$secretaria->apellidos}}</p>
                <h5 style="font-weight: bold">Email:</h5>
                <p>{{$secretaria->email}}</p>
                <h5 style="font-weight: bold">DNI:</h5>
                <p>{{$secretaria->dni}}</p>
                <h5 style="font-weight: bold">Celular:</h5>
                <p>{{$secretaria->celular}}</p>
                <h5 style="font-weight: bold">Fecha de nacimiento:</h5>
                <p>{{$secretaria->fecha_nacimiento}}</p>
                <h5 style="font-weight: bold">Dirección:</h5>
                <p>{{$secretaria->direccion}}</p>
                
                <div class="text-center">
                    <button class="btn btn-secondary" onclick="window.history.back();">Volver</button>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
