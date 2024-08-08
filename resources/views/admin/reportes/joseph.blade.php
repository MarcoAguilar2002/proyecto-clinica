<div class="card card-outline card-warning" id="reportBjgg">
    <div class="card-header">
        @php
            $fechaInicio = \Carbon\Carbon::parse($rangoFechas->fecha_inicio)->toFormattedDateString();
            $fechaFin = \Carbon\Carbon::parse($rangoFechas->fecha_fin)->toFormattedDateString();
        @endphp
        <h3 class="card-title">
            {{ __('Reporte de ganancias totales en S./ por Especialidad (' . $fechaInicio . ' hasta ' . $fechaFin . ')') }}
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div id="chartdiv" style="width: 80%; height: 300px;"></div>
</div>
<script src="//cdn.amcharts.com/lib/5/index.js"></script>
<script src="//cdn.amcharts.com/lib/5/percent.js"></script>
<script src="//cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<script>
    const pagosTotales = @json($pagosTotales);

    // Create root and chart
    var root = am5.Root.new("chartdiv");

    root.setThemes([
        am5themes_Animated.new(root)
    ]);

    var chart = root.container.children.push(
        am5percent.PieChart.new(root, {
            layout: root.horizontalLayout
        })
    );

    // Create series
    var series = chart.series.push(
        am5percent.PieSeries.new(root, {
            name: "Total",
            valueField: "total",
            categoryField: "especialidad",
            legendLabelText: "[{fill}]{category}[/]",
            legendValueText: "[bold {fill}]{value}[/]"
        })
    );
    series.data.setAll(pagosTotales);
    series.labels.template.set("forceHidden", true);
    series.ticks.template.set("forceHidden", true);

    // Add legend
    var legend = chart.children.push(
        am5.Legend.new(root, {
            centerY: am5.percent(50),
            y: am5.percent(50),
            layout: root.verticalLayout
        })
    );

    legend.data.setAll(series.dataItems);
</script>
