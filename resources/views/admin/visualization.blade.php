<x-app-layout>
    <div class="grid grid-cols-2 gap-10">
        <div id="container" class="chart-container"></div>
        <div id="pie-chart" class="chart-container"></div>
    </div>

    {{-- Highcharts --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    {{-- Charts --}}
    <script src="https://code.highcharts.com/modules/variable-pie.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    {{-- Reusable Scripts --}}
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>



    <script type="text/javascript">
        var females = @json($female);
        var males = @json($male);
        var bsis = @json($bsis);
        var act = @json($act);
        var bsais = @json($bsais);
        var bsa = @json($bsa);
        var bab = @json($bab);
        var bssw = @json($bssw);
        var all = @json($all);

        Highcharts.chart('container', {
            chart: {
                type: 'variablepie'
            },
            title: {
                text: 'Applications Ratio by Program',
                align: 'left'
            },
            tooltip: {
                headerFormat: '',
                pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' +
                    'Total number of Applicants: <b>{point.z}</b><br/>'
            },
            series: [{
                minPointSize: 10,
                innerSize: '20%',
                zMin: 0,
                name: 'gender',
                borderRadius: 5,
                data: [{
                    name: 'BSIS',
                    y: bsis,
                    z: bsis
                }, {
                    name: 'ACT',
                    y: act,
                    z: act
                }, {
                    name: 'BSA',
                    y: bsa,
                    z: bsa
                }, {
                    name: 'BSAIS',
                    y: bsais,
                    z: bsais
                }, {
                    name: 'BAB',
                    y: bab,
                    z: bab
                }, {
                    name: 'BSSW',
                    y: bssw,
                    z: bssw
                }],
                colors: [
                    '#4caefe',
                    '#3dc3e8',
                    '#2dd9db',
                    '#1feeaf',
                    '#0ff3a0',
                    '#00e887',
                    '#23e274'
                ]
            }]
        });

        // Create the chart
        Highcharts.chart('pie-chart', {
            chart: {
                type: 'pie'
            },

            title: {
                text: 'Applicants Percentage per Gender',
                align: 'left'
            },

            accessibility: {
                announceNewData: {
                    enabled: true
                },
                point: {
                    valueSuffix: '%'
                }
            },

            plotOptions: {
                series: {
                    borderRadius: 5,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: {point.percentage:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of ' +
                    @json($all) + '<br/>'
            },


            series: [{
                name: 'Programs',
                colorByPoint: true,
                data: [{
                        name: 'Male',
                        y: males
                    },
                    {
                        name: 'Female',
                        y: females,
                    }
                ]
            }],
        });
    </script>
</x-app-layout>
