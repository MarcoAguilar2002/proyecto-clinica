@extends('layouts.dashboard')

@section('title', 'Crear Historial')

@section('content')

    <div class="container">
        <div class="col-md-9">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Complete el formulario</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.historials.store') }}" method="POST">
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
                            <label for="detalle">Descripción de la cita</label>
                            <textarea name="detalle" id="editor" value="{{ old('detalle') }}" class="form-control" rows="4"
                                style="width: 100%;
                                box-sizing: border-box;
                                resize: none; "></textarea>

                            <script type="importmap">
                                {
                                    "imports": {
                                        "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.js",
                                        "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.2/"
                                    }
                                }
                            </script>

                            <script type="module">
                                import {
                                    ClassicEditor,
                                    Essentials,
                                    Bold,
                                    Italic,
                                    Font,
                                    Paragraph
                                } from 'ckeditor5';

                                ClassicEditor
                                    .create(document.querySelector('#editor'), {
                                        plugins: [Essentials, Bold, Italic, Font, Paragraph],
                                        toolbar: {
                                            items: [
                                                'undo', 'redo', '|', 'bold', 'italic', '|',
                                                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                                            ]
                                        }
                                    })
                                    .then( /* ... */ )
                                    .catch( /* ... */ );
                            </script>


                            @error('detalle')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="fechaVisita">Fecha de visita</label>
                            <div class="input-group">
                                <input type="date" name="fechaVisita" id="fechaVisita" class="form-control"
                                    value="{{ old('fechaVisita') }}">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-calendar"></span>
                                    </div>
                                </div>
                            </div>
                            @error('fechaVisita')
                                <small style="color:red">{{ $message }}</small>
                            @enderror
                        </div>

                    

                        <div class="row">
                            <div class="col">
                                <a href="{{ route('admin.historials.index') }}" class="btn btn-secondary">Cancelar</a>
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
