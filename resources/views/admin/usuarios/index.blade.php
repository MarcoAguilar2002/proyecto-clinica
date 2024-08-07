@extends('layouts.dashboard')

@section('title', 'Lista de Usuarios')

@section('content')

<div class="container">
    <table id="example1" class="table table-hover ">
        <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $contador = 1; ?>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $contador++ }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        <a href="{{route('admin.usuarios.show',$usuario->id)}}" class="btn btn-primary" style="background-color: blue;">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <a href="{{route('admin.usuarios.edit',$usuario->id)}}" class="btn btn-success" style="background-color: green;">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
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
        $(function () {
          $("#example1").DataTable({
            "pageLength": 8,
            "language": {
              "emptyTable": "No hay información",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ de Usuarios",
              "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
              "infoFiltered": "(Filtrado de _MAX_ total de Usuarios)",
              "lengthMenu": "Mostrar _MENU_ Usuarios",
              "infoPostFix":"",
              "thousands":",",
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
