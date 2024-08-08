<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="card card-outline card-warning">
        <div class="card-header">
            <h3 class="card-title">Número de Doctores por Especialidad</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: block;">
            <div class="row">
                <div class="col-md-8">
                    <div class="chart-responsive">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="pieChart" height="300" width="300" style="display: block; width: 50%; height: auto;" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="chart-legend clearfix" id="chart-legend">
                        <!-- Leyenda generada dinámicamente -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            var especialidades = @json($especialidades);

            var labels = [];
            var data = [];
            var backgroundColors = [
                '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', 
                '#ff9ff3', '#48dbfb', '#1dd1a1', '#feca57', '#ff6b6b', '#576574'
            ];

            especialidades.forEach(function(especialidad, index) {
                labels.push(especialidad.especialidad);
                data.push(especialidad.numero_doctores);
            });

            var ctx = document.getElementById('pieChart').getContext('2d');
            var pieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: backgroundColors.slice(0, labels.length) // Limitar los colores a la cantidad de especialidades
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false, 
                    }
                }
            });

            // Generar la leyenda manualmente
            var legendContainer = document.getElementById('chart-legend');
            labels.forEach(function(label, index) {
                var li = document.createElement('li');
                li.innerHTML = '<i class="far fa-circle" style="color:' + backgroundColors[index] + '"></i> ' + label;
                legendContainer.appendChild(li);
            });
        });
    </script>
</body>
</html>
