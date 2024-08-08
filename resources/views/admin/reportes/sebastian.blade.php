<div class="card card-outline card-success">
    <div class="card-header">
        <h3 class="card-title">Ingresos por doctores por año</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block">
        <div class="d-flex">
            <p class="d-flex flex-column">
                <span>Pagos por años y con su respectivo doctor</span>
            </p>
        </div>
        <div class="position-relative mb-4">
            <canvas id="sales-chart" height="200"></canvas>
        </div>
        <div class="d-flex flex-row justify-content-end">
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('sales-chart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                    $labels = [];
                    $years = [];
                    foreach ($pagos_doctores as $doctor_id => $pagos) {
                        // Solo considerar doctores que tengan pagos
                        if ($pagos->isNotEmpty()) {
                            foreach ($pagos as $pago) {
                                $year = date('Y', strtotime($pago->fecha_pago));
                                if (!in_array($year, $years)) {
                                    $years[] = $year;
                                    $labels[] = "'" . $year . "'";
                                }
                            }
                        }
                    }
                    sort($years); // Ordenar los años para evitar espacios
                    echo implode(',', $labels);
                    ?>
                ],
                datasets: [
                    <?php
                    foreach ($pagos_doctores as $doctor_id => $pagos) {
                        // Solo incluir doctores que tengan pagos
                        if ($pagos->isNotEmpty()) {
                            $doctor = $doctores->find($doctor_id);
                            $data = [];
                            foreach ($years as $year) {
                                $total = 0;
                                foreach ($pagos as $pago) {
                                    if (date('Y', strtotime($pago->fecha_pago)) == $year) {
                                        $total += $pago->monto;
                                    }
                                }
                                $data[] = $total; // Añade 0 si no hay pagos para ese año
                            }
                            echo "{
                                label: '" . $doctor->nombres . "',
                                backgroundColor: 'rgba(" . rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255) . ",0.9)',
                                borderColor: 'rgba(" . rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255) . ",0.8)',
                                data: [" . implode(',', $data) . "],
                                minBarLength: 5, // Establece la altura mínima de la barra a 1 pixel
                            },";
                        }
                    }
                    ?>
                ]

            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        },
                        offset: true
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        },
                        offset: true
                    }]
                },
                legend: {
                    display: true,
                }
            }
        });
    });
</script>