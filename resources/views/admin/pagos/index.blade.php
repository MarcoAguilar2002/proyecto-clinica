@extends('layouts.dashboard')

@section('title', 'Lista de Pagos')

@section('content')

    <div class="container">
        <table id="example1" class="table table-hover ">
            <thead>
                <tr class="text-center">
                    <th scope="col">N°</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Fecha de pago</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $contador = 1; ?>
                @foreach ($pagos as $pago)
                        <tr>
                            <td>{{ $contador++ }}</td>
                            <td>{{ $pago->paciente->apellidos.' '.$pago->paciente->nombres }}</td>
                            <td>{{ $pago->doctor->apellidos.'-'.$pago->doctor->especialidad}}</td>
                            <td>{{ $pago->fecha_pago}}</td>
                            <td>
                                <a href="{{ route('admin.pagos.show', $pago->id) }}" class="btn btn-primary"
                                    style="background-color: blue;">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('admin.pagos.pdf', $pago->id) }}" class="btn btn-warning"
                                    >
                                    <i class="bi bi-printer-fill"></i>
                                </a>
                                <a href="{{ route('admin.pagos.edit', $pago->id) }}" class="btn btn-success"
                                    style="background-color: green;">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.pagos.destroy', $pago->id) }}" method="POST"
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
                    "pageLength": 5,
                    "language": {
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ de Pagos",
                        "infoEmpty": "Mostrando 0 a 0 de 0 Pagos",
                        "infoFiltered": "(Filtrado de _MAX_ total de Pagos)",
                        "lengthMenu": "Mostrar _MENU_ Pagos",
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

@endsection
