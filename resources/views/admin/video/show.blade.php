@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.videos')
@endsection
@section('content')
    <script type="text/javascript" src="{{ asset('js/amcharts/amcharts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/amcharts/serial.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/amcharts/light.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/amcharts/lang/tm.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/amcharts/lang/ru.js') }}"></script>

    <div class="d-flex align-items-center justify-content-between">
        <div class="h4 mb-3">
            <a href="{{ route('admin.videos.index') }}">
                <i class="fas fa-caret-left"></i> @lang('transAdmin.videos')
            </a>
            <span class="text-gray-500">/</span>
            @lang('transAdmin.show')
        </div>

        <div>
            <a href="{{ route('admin.videos.edit', $obj->id) }}" class="btn btn-outline-success btn-sm mb-1">
                <i class="fas fa-pen"></i>
            </a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-dark btn-sm mb-1" data-toggle="modal"
                data-target="#d{{ $obj->id }}">
                <i class="fas fa-trash-alt"></i>
            </button>
            <!-- Modal -->
            <div class="modal fade" id="d{{ $obj->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div>
                                "{{ $obj->getTitle() }}" @lang('transAdmin.are-you-sure-want-to-delete')
                                <div class="mt-2 small">
                                    <span class="text-danger font-weight-bold">@lang('transAdmin.be-carefully')</span>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-right">
                            <form action="{{ route('admin.videos.delete', $obj->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">@lang('transAdmin.cancel')
                                </button>
                                <button type="submit" class="btn btn-dark btn-sm">@lang('transAdmin.delete')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="card shadow my-4">
                <div class="card-header py-3">
                    <div class="h6 mb-0">
                        {!! $obj->getTitle() !!}
                        <span class="text-secondary">(1 @lang('transAdmin.year') -
                            <span class="text-primary">{!! $days->sum('viewed_count') !!} @lang('transAdmin.viewed')</span>)</span>
                    </div>
                </div>
                @if ($days->count() > 0)
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

                        <!-- HTML -->
                        <div id="chartSerial" class="chart-serial"></div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
