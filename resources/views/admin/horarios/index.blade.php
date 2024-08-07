@extends('layouts.dashboard')

@section('title', 'Lista de horarios')

@section('content')

    <div class="container">
        <table id="example1" class="table table-hover ">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Día</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Consultorio</th>
                    <th scope="col">Hora de inicio</th>
                    <th scope="col">Hora de salida</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $contador = 1; ?>
                @foreach ($horarios as $horario)
                    <tr>
                        <td>{{ $contador++ }}</td>
                        <td>{{ $horario->dia }}</td>
                        <td>{{ $horario->doctor->nombres . ' ' . $horario->doctor->apellidos }}</td>
                        <td>{{ $horario->consultorio->nombre . '-' . $horario->consultorio->ubicacion }}</td>
                        <td>{{ $horario->hora_inicio }}</td>
                        <td>{{ $horario->hora_fin }}</td>

                        <td>
                            <a href="{{ route('admin.horarios.show', $horario->id) }}" class="btn btn-primary"
                                style="background-color: blue;">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <a href="{{ route('admin.horarios.edit', $horario->id) }}" class="btn btn-success"
                                style="background-color: green;">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.horarios.destroy', $horario->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="background-color: red;">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            $(function() {
                $("#example1").DataTable({
                    "pageLength": 7,
                    "language": {
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ de Horarios",
                        "infoEmpty": "Mostrando 0 a 0 de 0 Horarios",
                        "infoFiltered": "(Filtrado de _MAX_ total de Horarios)",
                        "lengthMenu": "Mostrar _MENU_ Horarios",
                        "infoPostFix": "",
                        "thousands": ",",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscador:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    buttons: [{
                        extend: 'collection',
                        text: 'Reportes',
                        orientation: 'landscape',
                        buttons: [{
                            text: 'Copiar',
                            extend: 'copy',
                        }, {
                            extend: 'pdf'
                        }, {
                            extend: 'csv'
                        }, {
                            extend: 'excel'
                        }, {
                            text: 'Imprimir',
                            extend: 'print'
                        }]
                    }, {
                        extend: 'colvis',
                        text: 'Visor de columnas',
                        collectionLayout: 'fixed three-column'
                    }],
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
    </div>
    <hr>

    <div class="container mt-5">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header row">
                    <div class="col-md-6 d-flex align-items-center">
                        <h3 class="card-title mb-0">Calendario de atención</h3>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-end">
                        <div class="d-flex align-items-center">
                            <label for="consultorio_select" class="font-weight-bold mr-2 mb-0">Consultorios:</label>
                            <select name="consultorio_id" id="consultorio_select" class="form-control">
                                @foreach ($consultorios as $consultorio)
                                    <option value="{{ $consultorio->id }}">
                                        {{ $consultorio->nombre . '-' . $consultorio->ubicacion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-body text-center">
                    <script>
                        $('#consultorio_select').on('change', function() {
                            var consultorio_id = $('#consultorio_select').val();
                            if (consultorio_id) {
                                $.ajax({
                                    url: "/admin/horarios/consultorios/" + consultorio_id,
                                    type: 'GET',
                                    success: function(data) {
                                        $('#consultorio_info').html(data);
                                    },
                                    error: function() {
                                        alert('Error al obtener los datos del consultorio');
                                    }
                                });
                            } else {
                                $('#consultorio_info').html('');
                            }
                        });
                    </script>

                    <div id="consultorio_info"></div>
                </div>
            </div>
        </div>
    </div>



@endsection
