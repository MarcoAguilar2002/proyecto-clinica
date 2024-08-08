@extends('layouts.dashboard')

@section('title', 'Crear pago')

@section('content')

    <div class="container">
        <div class="col-md-9">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Complete el formulario</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.pagos.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="paciente_id">Paciente</label>
                            <select name="paciente_id" id="paciente_id" class="form-control">
                                <option value="">Seleccionar paciente...</option>
                                @foreach ($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}">
                                        {{ $paciente->nombres . ' ' . $paciente->apellidos . '-' . $paciente->dni }}
                                    </option>
                                @endforeach
                            </select>
                            @error('paciente_id')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Doctor</label>
                            <select name="doctor_id" id="paciente_id" class="form-control">
                                <option value="">Seleccionar Doctor...</option>
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">
                                        {{ $doctor->nombres . ' ' . $doctor->apellidos  }}
                                    </option>
                                @endforeach
                            </select>
                            @error('doctor_id')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="fecha_pago">Fecha de pago</label>
                            <div class="input-group">
                                <input type="date" name="fecha_pago" id="fecha_pago"  class="form-control"
                                    value="<?php echo date('Y-m-d')?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-calendar"></span>
                                    </div>
                                </div>
                            </div>
                            @error('fecha_pago')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="monto">Monto</label>
                            <div class="input-group">
                                <input type="text" name="monto" id="monto" class="form-control"
                                    value="{{ old('monto') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="bi bi-cash-coin"></span>
                                    </div>
                                </div>
                            </div>
                            @error('monto')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="descripcion">Descripción</label>
                            <div class="input-group">
                                <input type="text" name="descripcion" id="descripcion" class="form-control"
                                    value="{{ old('descripcion') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="bi bi-alphabet"></span>
                                    </div>
                                </div>
                            </div>
                            @error('descripcion')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

                    

                        <div class="row">
                            <div class="col">
                                <a href="{{ route('admin.pagos.index') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                            <div class="col text-right">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
