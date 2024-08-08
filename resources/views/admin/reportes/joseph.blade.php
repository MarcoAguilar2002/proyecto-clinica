<div class="card  card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Especialidad más solicitada con los días, con más pacientes en esa especialidad</h3>
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
                    <canvas id="pieChart3" height="300" width="300" style="display: block; width: 50%; height: auto;" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="chart-legend clearfix">
                    <li><i class="far fa-circle text-danger"></i> Cardiología</li>
                    <li><i class="far fa-circle text-success"></i> Dermatología</li>
                    <li><i class="far fa-circle text-warning"></i> Gastroenterología</li>
                    <li><i class="far fa-circle text-info"></i> Neurología</li>
                    <li><i class="far fa-circle text-primary"></i> Pediatría</li>
                    <li><i class="far fa-circle text-secondary"></i> Urología</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('pieChart3').getContext('2d');
        var pieChart3 = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Cardiología', 'Dermatología', 'Gastroenterología', 'Neurología', 'Pediatría', 'Urología'],
                datasets: [{
                    data: [30, 20, 10, 15, 10, 15],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false, // Oculta la leyenda generada por Chart.js
                }
            }
        });
    });
</script>
