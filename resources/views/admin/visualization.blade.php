<x-app-layout>
    <div class="grid grid-cols-2 gap-10 mb-10">
        <div id="container" class="chart-container"></div>
        <div id="pie-chart" class="chart-container"></div>
    </div>

    <div class="grid grid-cols-1 gap-10">
        <div id="bar-chart" class="chart-container"></div>
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
        // Religion
        var mcgi = @json($mcgi);
        var catholic = @json($catholic);
        var jw = @json($jw);
        var inc = @json($inc);
        var sda = @json($sda);
        var baptist = @json($baptist);
        var bornagain = @json($bornagain);
        var islam = @json($islam);
        var others = @json($others);


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

        Highcharts.chart('bar-chart', {
            chart: {
                type: 'column',
                zoomType: 'y'
            },
            title: {
                text: 'Average Religions per Applicant'
            },
            xAxis: {
                categories: [
                    'MCGI',
                    'Roman Catholic',
                    'Jehovah\'s Witnesses',
                    'Iglesia ni Cristo',
                    'Seventh-day Adventist',
                    'Bible Baptist Church',
                    'Born Again Christian',
                    'Islam',
                    'Others',
                ],
                title: {
                    text: null
                },
                accessibility: {
                    description: 'Religions'
                }
            },
            yAxis: {
                min: 0,
                tickInterval: 10,
                title: {
                    text: 'Applicants'
                },
                labels: {
                    overflow: 'justify',
                    format: '{value}'
                }
            },
            plotOptions: {
                column: {
                    dataLabels: {
                        enabled: true,
                        format: '{y} Applicants'
                    }
                }
            },
            tooltip: {
                valueSuffix: ' total',
                stickOnContact: true,
                backgroundColor: 'rgba(255, 255, 255, 0.93)'
            },
            legend: {
                enabled: false
            },
            series: [{
                name: 'Wheat exportation in 2019',
                data: [mcgi, catholic, jw, inc, sda, baptist, bornagain, islam, others],
                borderColor: '#5997DE'
            }]
        });
    </script>
</x-app-layout>