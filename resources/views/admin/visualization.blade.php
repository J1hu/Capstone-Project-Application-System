<x-app-layout>
    <div class="grid grid-cols-2 gap-10 mb-10">
        <div id="container"></div>
        <div id="pie-chart"></div>
    </div>

    <div class="grid grid-cols-1 gap-10 mb-10">
        <div id="bar-chart"></div>
    </div>

    <div class="grid grid-cols-2 gap-10 mb-10">
        <div id="regions"></div>
        <div id="school_type"></div>
    </div>

    <div class="grid grid-cols-1 gap-10 mb-10">
        <div id="gender_program"></div>
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
        var public = @json($public);
        var private = @json($private);
        var s_university = @json($s_university);
        // Gender per program
        var bsismale = @json($bsismale);
        var bsisfemale = @json($bsisfemale);

        var actmale = @json($actmale);
        var actfemale = @json($actfemale);

        var bsaismale = @json($bsaismale);
        var bsaisfemale = @json($bsaisfemale);

        var bsamale = @json($bsamale);
        var bsafemale = @json($bsafemale);

        var babmale = @json($babmale);
        var babfemale = @json($babfemale);

        var bsswmale = @json($bsswmale);
        var bsswfemale = @json($bsswfemale);

        //regions
        var region1 = @json($region1);
        var region2 = @json($region2);
        var region3 = @json($region3);
        var region4a = @json($region4a);
        var region4b = @json($region4b);
        var region5 = @json($region5);
        var region6 = @json($region6);
        var region7 = @json($region7);
        var region8 = @json($region8);
        var region9 = @json($region9);
        var region10 = @json($region10);
        var region11 = @json($region11);
        var region12 = @json($region12);
        var region13 = @json($region13);
        var barmm = @json($barmm);
        var car = @json($car);
        var ncr = @json($ncr);

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
                name: 'Religion',
                data: [mcgi, catholic, jw, inc, sda, baptist, bornagain, islam, others],
                borderColor: '#5997DE'
            }]
        });

        Highcharts.chart('school_type', {
            chart: {
                type: 'pie'
            },

            title: {
                text: 'Applicants School type',
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
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of ' +
                    @json($all) + '<br/>'
            },


            series: [{
                name: 'Programs',
                colorByPoint: true,
                data: [{
                        name: 'Public',
                        y: public
                    },
                    {
                        name: 'Private',
                        y: private,
                    },
                    {
                        name: 'State University',
                        y: s_university,
                    }
                ]
            }],
        });

        Highcharts.chart('gender_program', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Gender per Program'
            },
            xAxis: {
                categories: [
                    'BSIS',
                    'ACT',
                    'BSAIS',
                    'BSA',
                    'BAB',
                    'BSSW',
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total Count'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Male',
                data: [bsismale, actmale, bsaismale, bsamale, babmale, bsswmale]

            }, {
                name: 'Female',
                data: [bsisfemale, actfemale, bsaisfemale, bsafemale, babfemale, bsswfemale]

            }]
        });

        Highcharts.chart('regions', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
                text: 'Total<br>applicants<br>per Region',
                align: 'center',
                verticalAlign: 'middle',
                y: 60
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        distance: -50,
                        style: {
                            fontWeight: 'bold',
                            color: 'white'
                        }
                    },
                    startAngle: -90,
                    endAngle: 90,
                    center: ['50%', '75%'],
                    size: '110%'
                }
            },
            series: [{
                type: 'pie',
                name: 'Total applicant percentage',
                innerSize: '40%',
                data: [
                    ['REGION I', region1],
                    ['REGION II', region2],
                    ['REGION III', region3],
                    ['REGION IV-A', region4a],
                    ['REGION IV-B', region4b],
                    ['REGION V', region5],
                    ['REGION VI', region6],
                    ['REGION VII', region7],
                    ['REGION VIII', region8],
                    ['REGION IX', region9],
                    ['REGION X', region10],
                    ['REGION XI', region11],
                    ['REGION XII', region12],
                    ['REGION XIII', region13],
                    ['BARMM', barmm],
                    ['CAR', car],
                    ['NCR', ncr]
                ]
            }]
        });
    </script>
</x-app-layout>