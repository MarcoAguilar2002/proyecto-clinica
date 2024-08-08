<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Distribución de pacientes por grupo sanguineo</h3>
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
                    <div id="chartdiv" style="width: 100%; height: 300px;"></div>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="chart-legend clearfix">
                    <li><i class="far fa-circle" style="color: #FF6F61;"></i> A+</li>
                    <li><i class="far fa-circle" style="color: #6B5B95;"></i> A-</li>
                    <li><i class="far fa-circle" style="color: #88B04B;"></i> B+</li>
                    <li><i class="far fa-circle" style="color: #F7CAC9;"></i> B-</li>
                    <li><i class="far fa-circle" style="color: #92A8D1;"></i> O+</li>
                    <li><i class="far fa-circle" style="color: #955251;"></i> O-</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Recursos de AmCharts -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Código del gráfico -->
<script>
    am5.ready(function() {
        // Crear el elemento root
        var root = am5.Root.new("chartdiv");

        // Establecer temas
        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        // Crear el gráfico
        var chart = root.container.children.push(
            am5percent.PieChart.new(root, {
                endAngle: 270
            })
        );

        // Crear la serie
        var series = chart.series.push(
            am5percent.PieSeries.new(root, {
                valueField: "total",
                categoryField: "grupo_sanguineo",
                endAngle: 270
            })
        );

        series.states.create("hidden", {
            endAngle: -90
        });

        // Asignar colores específicos a cada categoría
        series.slices.template.adapters.add("fill", function(fill, target) {
            var dataItem = target.dataItem;
            switch (dataItem.dataContext.grupo_sanguineo) {
                case "A+":
                    return am5.color("#FF6F61"); // Coral
                case "A-":
                    return am5.color("#6B5B95"); // Púrpura
                case "B+":
                    return am5.color("#88B04B"); // Verde
                case "B-":
                    return am5.color("#F7CAC9"); // Rosa
                case "O+":
                    return am5.color("#92A8D1"); // Azul claro
                case "O-":
                    return am5.color("#955251"); // Marrón
                default:
                    return fill;
            }
        });

        // Establecer datos
        series.data.setAll(@json($grupo_sanguineo_data));

        series.appear(1000, 100);
    }); // fin de am5.ready()
</script>
