@extends('layouts.dashboard')

@section('ruta', 'Inicio')

@section('content')
    <style>
        .btn-group-toggle .btn {
            margin-bottom: 5px;
        }

        .horarios-container {
            display: flex;
            flex-wrap: wrap;
        }

        .horarios-container label {
            flex: 1 0 48%;
            /* Ajusta esto según tus necesidades */
            margin: 5px;
        }
    </style>


    <div class="row container">
        <h5><b>Bienvenido: </b>{{ Auth::user()->name }} / <b>Rol:</b> {{ Auth::user()->roles->pluck('name')->first() }}</h5>
    </div>
    <hr>

    <div class="row">
        @can('admin.usuarios.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total_usuarios }}</h3>
                        <p>Usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas bi bi-file-person"></i>
                    </div>
                    <a href="{{ route('admin.usuarios.index') }}" class="small-box-footer">Más información <i
                            class="fas bi bi-file-person"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.secretarias.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ $total_secretarias }}</h3>
                        <p>Secretarias</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas bi bi-file-person"></i>
                    </div>
                    <a href="{{ route('admin.secretarias.index') }}" class="small-box-footer">Más información <i
                            class="fas bi bi-file-person"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.pacientes.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $total_pacientes }}</h3>
                        <p>Pacientes</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas bi bi-file-person"></i>
                    </div>
                    <a href="{{ route('admin.pacientes.index') }}" class="small-box-footer">Más información <i
                            class="fas bi bi-file-person"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.consultorios.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $total_consultorios }}</h3>
                        <p>Consultorios</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas bi bi-building"></i>
                    </div>
                    <a href="{{ route('admin.consultorios.index') }}" class="small-box-footer">Más información <i
                            class="fas bi bi-building"></i></a>
                </div>
            </div>
        @endcan


        @can('admin.doctores.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_doctores }}</h3>
                        <p>Doctores</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas bi bi-person-fill-add"></i>
                    </div>
                    <a href="{{ route('admin.doctores.index') }}" class="small-box-footer">Más información <i
                            class="fas bi bi-person-fill-add"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.horarios.index')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $total_horarios }}</h3>
                        <p>Horarios</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas bi bi-calendar-event"></i>
                    </div>
                    <a href="{{ route('admin.horarios.index') }}" class="small-box-footer">Más información <i
                            class="fas bi bi-calendar-event"></i></a>
                </div>
            </div>
        @endcan

    </div>

    @can('admin.eventos.store')
    <div class="d-flex justify-content-center">
        <div class="col-12 col-md-10">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">Calendario de reserva de citas médicas</h3>
                    <div class="card-tools">
                    </div>
                </div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <div class="row">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Reservar cita médica
                        </button>
                        <a href="{{route('admin.reservas')}}" class="btn btn-success ml-3"> <i class="bi bi-calendar-event-fill"></i>  Ver Reservas</a>
                    </div>

                    <!-- Modal -->
                    <form action="{{ route('admin.eventos.store') }}" method="POST" onsubmit="prepararDatos()">
                        @csrf
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Registro de cita médica</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="especialidad">Especialidad</label>
                                                    <select name="consultorio_id" id="especialidad" class="form-control">
                                                        <option>Seleccione una especialidad...</option>
                                                        @foreach ($consultorios as $consultorio)
                                                            <option value="{{ $consultorio->especialidad }}">
                                                                {{ $consultorio->especialidad }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="fecha_reserva">Fecha de reserva</label>
                                                    <input type="date" id="fecha_reserva" class="form-control"
                                                        min="{{ date('Y-m-d') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="doctor">Doctor</label>
                                                    <select name="doctor_id" id="doctor" class="form-control">
                                                        <!-- Opciones se cargarán mediante JavaScript -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Seleccione una hora</label>
                                                    <div class="btn-group btn-group-toggle horarios-container"
                                                        data-toggle="buttons" id="horarios-container">
                                                        <!-- Los horarios se cargarán aquí mediante JavaScript -->
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="color" id="color">
                                            <input type="hidden" name="start" id="start">
                                            <input type="hidden" name="end" id="end">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>




                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                events: [
                    @foreach ($eventos as $evento)
                        {
                            title: '{{ $evento->title }}',
                            start: '{{\Carbon\Carbon::parse($evento->start)->format('Y-m-d')}}',
                            end: '{{\Carbon\Carbon::parse($evento->end)->format('Y-m-d')}}',
                            color: '{{ $evento->color }}'
                        },
                    @endforeach
                ]
            });
            calendar.render();
        });
    </script>

    <script>
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        function prepararDatos() {
            const color = getRandomColor();
            document.getElementById('color').value = color;

            const fecha = document.getElementById('fecha_reserva').value;
            const turno = document.querySelector('input[name="turno"]:checked').value;

            const [horaInicio, horaFin] = turno.split('-');
            const start = `${fecha} ${horaInicio}:00`;
            const end = `${fecha} ${horaFin}:00`;

            document.getElementById('start').value = start;
            document.getElementById('end').value = end;
        }

        document.getElementById('especialidad').addEventListener('change', function() {
            var especialidad = this.value;
            var doctorSelect = document.getElementById('doctor');
            doctorSelect.innerHTML = '';

            fetch('/doctores?especialidad=' + especialidad)
                .then(response => response.json())
                .then(data => {
                    data.forEach(doctor => {
                        var option = document.createElement('option');
                        option.value = doctor.id;
                        option.textContent = doctor.nombres + ' ' + doctor.apellidos;
                        doctorSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        });

        document.getElementById('fecha_reserva').addEventListener('change', function() {
            var fecha = this.value;
            var doctorId = document.getElementById('doctor').value;

            if (!doctorId) {
                alert('Seleccione un doctor primero');
                return;
            }

            fetch('/horarios?doctor_id=' + doctorId + '&fecha=' + fecha)
                .then(response => response.json())
                .then(data => {
                    var horariosContainer = document.getElementById('horarios-container');
                    horariosContainer.innerHTML = '';

                    data.forEach(horario => {
                        var inicio = new Date(`1970-01-01T${horario.hora_inicio}`);
                        var fin = new Date(`1970-01-01T${horario.hora_fin}`);

                        while (inicio < fin) {
                            var endTime = new Date(inicio.getTime() + 20 * 60000);

                            var label = document.createElement('label');
                            label.classList.add('btn', 'btn-outline-secondary');
                            var input = document.createElement('input');
                            input.type = 'radio';
                            input.name = 'turno';
                            input.value =
                                `${inicio.toTimeString().substr(0, 5)}-${endTime.toTimeString().substr(0, 5)}`;

                            label.appendChild(input);
                            label.appendChild(document.createTextNode(
                                ` ${inicio.toTimeString().substr(0, 5)} - ${endTime.toTimeString().substr(0, 5)}`
                            ));

                            horariosContainer.appendChild(label);

                            inicio = endTime;
                        }
                    });
                })
                .catch(error => console.error('Error:', error));
        });
    </script>



@endsection
