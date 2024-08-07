@extends('layouts.dashboard')

@section('title', 'Lista de Secretarias')

@section('content')

    <div class="container">
        <table id="example1" class="table table-hover ">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $contador = 1; ?>
                @foreach ($secretarias as $secretaria)
                    <tr>
                        <td>{{ $contador++ }}</td>
                        <td>{{ $secretaria->nombres }}</td>
                        <td>{{ $secretaria->apellidos }}</td>
                        <td>{{ $secretaria->dni }}</td>
                        <td>{{ $secretaria->celular }}</td>
                        <td>{{ $secretaria->fecha_nacimiento }}</td>
                        <td>{{ $secretaria->direccion }}</td>
                        <td>
                            <a href="{{ route('admin.secretarias.show', $secretaria->id) }}" class="btn btn-primary"
                                style="background-color: blue;">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <a href="{{ route('admin.secretarias.edit', $secretaria->id) }}" class="btn btn-success"
                                style="background-color: green;">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('admin.secretarias.destroy', $secretaria->id) }}" method="POST"
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
                    "pageLength": 8,
                    "language": {
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ de Secretarias",
                        "infoEmpty": "Mostrando 0 a 0 de 0 Secretarias",
                        "infoFiltered": "(Filtrado de _MAX_ total de Secretarias)",
                        "lengthMenu": "Mostrar _MENU_ Secretarias",
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
