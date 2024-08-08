<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Reporte de día con mayor cantidad de atenciones en turno tarde según especialidad de forma mensual</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block">
        <div class="d-flex">
            <p class="d-flex flex-column">
                <span class="text-bold text-lg">$18,230.00</span>
                <span>Sales Over Time</span>
            </p>
            <p class="ml-auto d-flex flex-column text-right">
                <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 33.1%
                </span>
                <span class="text-muted">Since last month</span>
            </p>
        </div>
        <div class="position-relative mb-4">
            <canvas id="sales-chart2" height="200"></canvas>
        </div>
        <div class="d-flex flex-row justify-content-end">
            <span class="mr-2">
                <i class="fas fa-square text-primary"></i> This year
            </span>
            <span>
                <i class="fas fa-square text-gray"></i> Last year
            </span>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('sales-chart2').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'This year',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    data: [2000, 1500, 2500, 2200, 2100, 2300, 3000]
                }, {
                    label: 'Last year',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    data: [1200, 1700, 1400, 1900, 1800, 1600, 2200]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                },
                legend: {
                    display: true,
                }
            }
        });
    });
</script>
