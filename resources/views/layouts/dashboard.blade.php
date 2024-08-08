<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ciudad de Dios</title>

    <link rel="stylesheet"
        href="{{ url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href={{ url('dist/css/adminlte.min.css?v=3.2.0') }}>
    <link rel="stylesheet" href="{{ url('plugins/chart.js/Chart.css') }}">
    <!--Iconos de bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--JSQUERY-->
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
    <!--Sweet Alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--DataTable-->
    <link rel="stylesheet" href="{{ url('../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!--FULL CALENDAR-->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src="{{ url('calendar/es.global.js') }}"></script>
    
    <!--CKEDITOR-->
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.css" />

    <!--Script-->
    <script src="{{ url('plugins/chart.js/Chart.min.js')  }}"></script>
    <script src="{{ url('plugins/jquery-knob/jquery.knob.min.js')  }}"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">



                <li class="nav-item dropdown">

                </li>

            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="{{ route('admin.index') }}" class="brand-link">
                <img src="{{ url('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Ciudad de Dios</span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">{{ auth::user()->name }}</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @can('admin.usuarios.index')
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="bi bi-people-fill"></i>
                                    <p>
                                        Usuarios
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview" style="display: none">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.usuarios.create') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Crear Usuario</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.usuarios.index') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de usuarios</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        @endcan

                        @can('admin.secretarias.index')
                            <li class="nav-item menu-open" >
                                <a href="#" class="nav-link active">
                                    <i class="bi bi-person-rolodex"></i>
                                    <p>
                                        Secretarias
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview" style="display: none">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.secretarias.create') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Crear Secretaria</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.secretarias.index') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de secretarias</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        @endcan
                        <!--Secretarias-->


                        <!--Pacientes-->
                        @can('admin.pacientes.index')
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="bi bi-person-fill-check"></i>
                                    <p>
                                        Pacientes
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview" style="display: none">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pacientes.create') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Crear Paciente</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pacientes.index') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de pacientes</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        @endcan


                        <!--Consultorios-->
                        @can('admin.consultorios.index')
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="bi bi-building"></i>
                                    <p>
                                        Consultorios
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview" style="display: none">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.consultorios.create') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Crear Consultorio</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.consultorios.index') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de consultorios</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        @endcan


                        <!--Doctores-->
                        @can('admin.doctores.index')
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="bi bi-person-fill-add"></i>
                                    <p>
                                        Doctores
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview" style="display: none">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.doctores.create') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Crear Doctor</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.doctores.index') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de doctores</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        @endcan


                        <!--Horarios-->
                        @can('admin.horarios.index')
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="bi bi-calendar-event"></i>
                                    <p>
                                        Horarios
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview" style="display: none">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.horarios.create') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Crear Horario</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.horarios.index') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de Horarios</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        @endcan

                        @can('admin.reservas')
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="bi bi-ticket-detailed-fill"></i>
                                    <p>
                                        Citas
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview" style="display: none">
                                    @can('admin.eventos.store')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.index') }}" class="nav-link active">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Reservar cita</p>
                                            </a>
                                        </li>
                                    @endcan

                                    <li class="nav-item">
                                        <a href="{{ route('admin.reservas') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Historial de citas</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        @endcan
                        @if (Auth::check() && Auth::user()->doctor)
                            @can('admin.doctor.cita')
                                <li class="nav-item menu-open">
                                    <a href="#" class="nav-link active">
                                        <i class="bi bi-ticket-detailed-fill"></i>
                                        <p>
                                            Citas
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>

                                    <ul class="nav nav-treeview" style="display: none">

                                        <li class="nav-item">
                                            <a href="{{ route('admin.index') }}" class="nav-link active">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Mis citas</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('admin.doctor.cita') }}" class="nav-link active">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Cambiar estado</p>
                                            </a>
                                        </li>
                                    </ul>

                                </li>
                            @endcan
                        @endif

                        @can('admin.reportes')
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="bi bi-file-earmark-bar-graph-fill"></i>
                                <p>
                                    Reportes
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview" style="display: none">
                                <li class="nav-item">
                                    <a href="{{ route('admin.reportes') }}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ver Reportes</p>
                                    </a>
                                </li>


                            </ul>

                        </li>
                        @endcan
                        @can('admin.historials.index')
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="bi bi-file-earmark-medical-fill"></i>
                                    <p>
                                        Historial
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview" style="display: none">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.historials.index') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado Historial</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.historials.create') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Crear Historial</p>
                                        </a>
                                    </li>

                                </ul>

                            </li>
                        @endcan

                        @can('admin.pagos.index')
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="bi bi-cash-stack"></i>
                                    <p>
                                        Pagos
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview" style="display: none">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pagos.index') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de pagos</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pagos.create') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Registrar pago</p>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        @endcan

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-left"></i>
                                <p>
                                    Cerrar Sesión
                                </p>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('ruta')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            @if (($message = Session::get('mensaje')) && ($icono = Session::get('icono')) && ($titulo = Session::get('titulo')))
                <script>
                    Swal.fire({
                        icon: "{{ $icono }}",
                        title: "{{ $titulo }}",
                        text: "{{ $message }}",
                        showConfirmButton: false,
                        timer: 2500
                    });
                </script>
            @endif

            <div class="content">
                @yield('content')
            </div>

        </div>


    </div>



    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!--Datatable-->
    <script src="{{ url('../../plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('../../plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('../../plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('../../plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('../../plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('../../plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('../../plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('../../plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('../../plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!--Admin-->
    <script src="{{ url('dist/js/adminlte.min.js?v=3.2.0') }}"></script>
</body>

</html>
