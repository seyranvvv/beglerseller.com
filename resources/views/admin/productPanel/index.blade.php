@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.product-panel')
@endsection
@section('content')
    {{-- <script type="text/javascript" src="{!! asset('js/Chart.bundle.min.js') !!}"></script> --}}

    @push('js')
        <script type="text/javascript" src="{{ asset('js/amcharts/amcharts.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/amcharts/serial.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/amcharts/light.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/amcharts/lang/tm.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/amcharts/lang/ru.js') }}"></script>
    @endpush
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-3">@lang('transAdmin.product-panel')</div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row my-2">
                <div class="col-md-6">
                    <div class="card shadow my-3">
                        <div class="card-header py-3">
                            <div class="h6 mb-0">
                                @lang('transAdmin.products-by-category')
                                <span class="text-secondary">(@lang('transAdmin.top') 10)</span>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <canvas id="myChart1" width="100" height="65"></canvas>
                        </div>
                    </div>
                    @push('js')
                        <script>
                            var ctx = document.getElementById("myChart1");
                            var myChart1 = new Chart(ctx, {
                                type: 'horizontalBar',
                                data: {
                                    labels: [
                                        @foreach ($productsByCategory as $productByCategory)
                                            "{!! $productByCategory->category->getName() !!}",
                                        @endforeach
                                    ],
                                    datasets: [{
                                        data: [
                                            @foreach ($productsByCategory as $productByCategory)
                                                "{!! $productByCategory->count !!}",
                                            @endforeach
                                        ],
                                        backgroundColor: ['#E57373', '#64B5F6', '#DCE775', '#81C784', '#BA68C8', '#FFB74D',
                                            '#4DD0E1', '#F06292', '#A1887F', '#FFD54F', '#E57373', '#64B5F6', '#DCE775',
                                            '#81C784'
                                        ],
                                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                                    }],
                                },
                                options: {
                                    legend: false,
                                    scales: {
                                        xAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    },
                                },
                            });
                        </script>
                    @endpush
                </div>
                <div class="col-md-6">
                    <div class="card shadow my-3">
                        <div class="card-header py-3">
                            <div class="h6 mb-0">
                                @lang('transAdmin.products-by-brand')
                                <span class="text-secondary">(@lang('transAdmin.top') 10)</span>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <canvas id="myChart3" width="100" height="65"></canvas>
                        </div>
                    </div>
                    @push('js')
                        <script>
                            var ctx = document.getElementById("myChart3");
                            var myChart3 = new Chart(ctx, {
                                type: 'horizontalBar',
                                data: {
                                    labels: [
                                        @foreach ($productsByBrand as $productByBrand)
                                            "{!! $productByBrand->brand->getName() !!}",
                                        @endforeach
                                    ],
                                    datasets: [{
                                        data: [
                                            @foreach ($productsByBrand as $productByBrand)
                                                "{!! $productByBrand->count !!}",
                                            @endforeach
                                        ],
                                        backgroundColor: ['#E57373', '#64B5F6', '#DCE775', '#81C784', '#BA68C8', '#FFB74D',
                                            '#4DD0E1', '#F06292', '#A1887F', '#FFD54F', '#E57373', '#64B5F6', '#DCE775',
                                            '#81C784'
                                        ],
                                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                                    }],
                                },
                                options: {
                                    legend: false,
                                    scales: {
                                        xAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    },
                                },
                            });
                        </script>
                    @endpush
                </div>
                <div class="col-md-12">
                    <div class="card shadow my-3">
                        <div class="card-header py-3">
                            <div class="h6 mb-0">
                                @lang('transAdmin.products')
                                <span class="text-secondary">(1 @lang('transAdmin.year') -
                                    <span class="text-primary">{!! $days->sum('viewed_count') !!} @lang('transAdmin.viewed')</span>)</span>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <!-- Styles -->
                            <style>
                                .chart-serial {
                                    position: relative;
                                    height: 12.5rem;
                                    width: 100%;
                                }

                                @media (min-width: 768px) {
                                    .chart-serial {
                                        height: 25rem;
                                    }
                                }

                                #chartSerial {
                                    width: 100%;
                                }

                                .amcharts-chart-div a {
                                    display: none !important;
                                }
                            </style>
                            <!-- Chart code -->
                            @push('js')
                                <script>
                                    var chartData = chartData();
                                    var chart = AmCharts.makeChart("chartSerial", {
                                        "type": "serial",
                                        "theme": "light",
                                        @if (app()->getLocale() == 'fr')
                                            "language": "tm",
                                        @elseif (app()->getLocale() == 'ru')
                                            "language": "ru",
                                        @endif
                                        "autoMarginOffset": 10,
                                        "marginTop": 15,
                                        "dataProvider": chartData,
                                        "valueAxes": [{
                                            "axisAlpha": 0.2,
                                            "dashLength": 1,
                                            "position": "left"
                                        }],
                                        "mouseWheelZoomEnabled": true,
                                        "graphs": [{
                                            "id": "g1",
                                            "balloonText": "[[value]]",
                                            "bullet": "round",
                                            "bulletBorderAlpha": 1,
                                            "bulletColor": "#FFFFFF",
                                            "hideBulletsCount": 50,
                                            "valueField": "countA",
                                            "useLineColorForBulletBorder": true,
                                            "balloon": {
                                                "drop": true
                                            }
                                        }],
                                        "chartScrollbar": {
                                            "autoGridCount": true,
                                            "graph": "g1",
                                            "scrollbarHeight": 40
                                        },
                                        "chartCursor": {
                                            "limitToGraph": "g1"
                                        },
                                        "categoryField": "date",
                                        "categoryAxis": {
                                            "parseDates": true,
                                            "axisColor": "#DADADA",
                                            "dashLength": 1,
                                            "minorGridEnabled": true
                                        }
                                    });

                                    chart.addListener("rendered", zoomChart);
                                    zoomChart();

                                    // this method is called when chart is first inited as we listen for "rendered" event
                                    function zoomChart() {
                                        // different zoom methods can be used - zoomToIndexes, zoomToDates, zoomToCategoryValues
                                        chart.zoomToIndexes(chartData.length - 40, chartData.length - 1);
                                    }

                                    function chartData() {
                                        var chartData = [];
                                        @foreach ($days as $day)
                                            var $date = new Date('{{ $day->day }}');
                                            var $countA = parseInt({{ $day->viewed_count }});
                                            chartData.push({
                                                date: $date,
                                                countA: $countA,
                                            });
                                        @endforeach
                                        return chartData;
                                    }
                                </script>
                            @endpush
                            <!-- HTML -->
                            <div id="chartSerial" class="chart-serial"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
