<div class="col-md-12">
    <div class="card collapsed-card card-outline card-success">
        <div class="card-header">
            <h5 class="card-title">Monthly Recap Report</h5>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>

        <div class="card-body" style="display: none;">
            <div class="row">
                <div class="col-md-8">
                    <p class="text-center">
                        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                    </p>
                    <div class="chart">
                        <canvas id="salesChart" height="180" style="height: 180px; width: 100%;"></canvas>
                    </div>
                </div>

                <div class="col-md-4">
                    <p class="text-center">
                        <strong>Goal Completion</strong>
                    </p>
                    <div class="progress-group">
                        Add Products to Cart
                        <span class="float-right"><b>160</b>/200</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: 80%"></div>
                        </div>
                    </div>

                    <div class="progress-group">
                        Complete Purchase
                        <span class="float-right"><b>310</b>/400</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-danger" style="width: 75%"></div>
                        </div>
                    </div>

                    <div class="progress-group">
                        <span class="progress-text">Visit Premium Page</span>
                        <span class="float-right"><b>480</b>/800</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success" style="width: 60%"></div>
                        </div>
                    </div>

                    <div class="progress-group">
                        Send Inquiries
                        <span class="float-right"><b>250</b>/500</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning" style="width: 50%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer" style="display: none;">
            <div class="row">
                <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                        <h5 class="description-header">$35,210.43</h5>
                        <span class="description-text">TOTAL REVENUE</span>
                    </div>
                </div>

                <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                        <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                        <h5 class="description-header">$10,390.90</h5>
                        <span class="description-text">TOTAL COST</span>
                    </div>
                </div>

                <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                        <h5 class="description-header">$24,813.53</h5>
                        <span class="description-text">TOTAL PROFIT</span>
                    </div>
                </div>

                <div class="col-sm-3 col-6">
                    <div class="description-block">
                        <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                        <h5 class="description-header">1200</h5>
                        <span class="description-text">GOAL COMPLETIONS</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Incluye Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Script para generar el gráfico -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Sales',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: 'rgba(60,141,188,0.2)',
                    borderColor: 'rgba(60,141,188,1)',
                    pointBackgroundColor: 'rgba(60,141,188,1)',
                    pointBorderColor: '#3b8bba',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(60,141,188,1)',
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
                            display: false,
                        }
                    },
                    y: {
                        ticks: {
                            color: '#000'
                        },
                        grid: {
                            display: true,
                            color: 'rgba(0,0,0,0.1)'
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
