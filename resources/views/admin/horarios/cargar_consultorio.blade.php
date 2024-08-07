<h3>Horario de atención del consultorio de {{ $consultorio->nombre }}</h3>
<table class="table table-striped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>Hora</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sábado</th>
        </tr>
    </thead>
    <tbody>
        @php
            $horas = ['08:00:00-09:00:00', '09:00:00-10:00:00', '10:00:00-11:00:00', '11:00:00-12:00:00', '12:00:00-13:00:00', '13:00:00-14:00:00', '14:00:00-15:00:00', '15:00:00-16:00:00', '16:00:00-17:00:00'];
            $diasSem = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
        @endphp
        @foreach($horas as $hora)
            @php
                list($hora_inicio, $hora_fin) = explode('-', $hora);
            @endphp
            <tr>
                <td>{{ $hora }}</td>
                @foreach($diasSem as $dia)
                    @php
                        $nombreDoc = '';
                        foreach ($horarios as $horario) {
                            if ($horario->dia == $dia && $hora_inicio >= $horario->hora_inicio && $hora_fin <= $horario->hora_fin) {
                                $nombreDoc = $horario->doctor->nombres . " " . $horario->doctor->apellidos;
                                break;
                            }
                        }
                    @endphp
                    <td>{{ $nombreDoc }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
