<div class="card card-outline card-success">
    <div class="card-header">
        <h3 class="card-title">Reporte de cantidad de pagos pagados y sin pagar por especialidad</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: block">
        <canvas id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
    </div>
    <div class="card-footer bg-transparent" style="display: none;">
        <div class="row">
            <div class="col-4 text-center">
                <div style="display:inline;width:60px;height:60px;">
                    <canvas width="48" height="48" style="width: 60px; height: 60px;"></canvas>
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;">
                </div>
                <div class="">Mail-Orders</div>
            </div>

            <div class="col-4 text-center">
                <div style="display:inline;width:60px;height:60px;">
                    <canvas width="48" height="48" style="width: 60px; height: 60px;"></canvas>
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;">
                </div>
                <div class="">Online</div>
            </div>

            <div class="col-4 text-center">
                <div style="display:inline;width:60px;height:60px;">
                    <canvas width="48" height="48" style="width: 60px; height: 60px;"></canvas>
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;">
                </div>
                <div class="">In-Store</div>
            </div>

        </div>
    </div>
</div>



<!-- Incluye Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Script para generar el gráfico de líneas -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('line-chart').getContext('2d');
        var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Sales',
                    data: [50, 60, 70, 80, 90, 100, 110],
                    borderColor: 'rgba(57, 204, 204, 0.8)',
                    backgroundColor: 'rgba(57, 204, 204, 0.1)',
                    pointBackgroundColor: '#39CCCC',
                    pointBorderColor: '#39CCCC',
                    pointHoverBackgroundColor: '#000',
                    pointHoverBorderColor: '#39CCCC'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        ticks: {
                            color: '#000'
                        },
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        ticks: {
                            color: '#000'
                        },
                        grid: {
                            color: 'rgba(255, 255, 255, 0.2)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: '#000'
                        }
                    }
                }
            }
        });
    });
</script>


