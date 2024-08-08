@extends('layouts.dashboard')

@section('ruta', 'Citas')
@section('title', 'Modificar citas')

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header row">
            <div class="col-md-6 d-flex align-items-center">
                <h3 class="card-title mb-0">Calendario de atención</h3>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
            </div>
        </div>

        <div class="card-body ">
            <div class="col-md-12">
                <table id="example2" class="table table-hover ">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">N°</th>
                            <th scope="col">Paciente</th>
                            <th scope="col">Fecha y hora de Reserva</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php $contador = 1; ?>
                        @foreach ($eventos as $evento)
                            @if (Auth::user()->doctor->id == $evento->doctor_id)
                                <tr class="text-center">
                                    <td>{{ $contador++ }}</td>
                                    <td>{{ $evento->user->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($evento->start)->format('Y-m-d') . ' ' . \Carbon\Carbon::parse($evento->end)->format('H:i:s') }}
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <form action="{{ route('admin.doctor.editarCita', $evento->id) }}"
                                                id="formulario2{{ $evento->id }}"
                                                onclick="preguntar2{{ $evento->id }}(event)" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger"
                                                    style="background-color: green;"
                                                    @if ($evento->estado == 'Finalizada' || $evento->estado == 'Cancelada' ) disabled @endif>
                                                    <i class="bi bi-x-circle"></i>
                                                </button>
                                            </form>
                                            
                                            <script>
                                                function preguntar2{{ $evento->id }}(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: "¿Seguro que quieres finalizar la cita?",
                                                        text: "De confirmar, la cita se ha realizado con éxito",
                                                        icon: "question",
                                                        showCancelButton: true,
                                                        confirmButtonColor: "#008000",
                                                        cancelButtonColor: "#3085d6",
                                                        confirmButtonText: "Sí, finalizar"
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            var form = $('#formulario2{{ $evento->id }}');
                                                            form.submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <form action="{{ route('admin.reservas.destroy', $evento->id) }}"
                                                id="formulario{{ $evento->id }}"
                                                onclick="preguntar{{ $evento->id }}(event)" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    style="background-color: red;"
                                                    @if ($evento->estado == 'Finalizada' || $evento->estado == 'Cancelada') disabled @endif>
                                                    <i class="bi bi-x-circle"></i>
                                                </button>
                                            </form>
                                            
                                            <script>
                                                function preguntar{{ $evento->id }}(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: "¿Seguro que quieres cancelar tu reserva?",
                                                        text: "De cancelar tu reserva, otro paciente podrá tomar tu turno",
                                                        icon: "question",
                                                        showCancelButton: true,
                                                        confirmButtonColor: "#d33",
                                                        cancelButtonColor: "#3085d6",
                                                        confirmButtonText: "Sí, cancelar"
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            var form = $('#formulario{{ $evento->id }}');
                                                            form.submit();

                                                        }
                                                    });
                                                }
                                            </script>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <script>
                $(function() {
                    $("#example2").DataTable({
                        "pageLength": 4,
                        "language": {
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ de Citas",
                            "infoEmpty": "Mostrando 0 a 0 de 0 Citas",
                            "infoFiltered": "(Filtrado de _MAX_ total de Citas)",
                            "lengthMenu": "Mostrar _MENU_ Citas",
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
                    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
                });
            </script>
        </div>
    </div>
</div>

@endsection