@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.order-panel')
@endsection
@section('content')
    {{-- <script type="text/javascript" src="{!! asset('js/Chart.bundle.min.js') !!}"></script> --}}

    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-3">@lang('transAdmin.order-panel')</div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row my-2">
                <div class="col-md-6">
                    <div class="card shadow my-3">
                        <div class="card-header py-3">
                            <div class="h6 mb-0">
                                @lang('transAdmin.bestseller-products')
                                <span class="text-secondary">(1 @lang('transAdmin.year'), @lang('transAdmin.top') 10)</span>
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
                                        @foreach ($bestsellers as $bestseller)
                                            "{!! $bestseller->product->getName() !!}",
                                        @endforeach
                                    ],
                                    datasets: [{
                                        data: [
                                            @foreach ($bestsellers as $bestseller)
                                                "{!! $bestseller->count !!}",
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
                                @lang('transAdmin.products-by-month')
                                <span class="text-secondary">(1 @lang('transAdmin.year'))</span>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <canvas id="myChart2" width="100" height="65"></canvas>
                        </div>
                    </div>
                    @push('js')
                        <script>
                            var ctx = document.getElementById("myChart2");
                            var myChart2 = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: [
                                        @foreach ($productsByMonth as $productByMonth)
                                            "{!! $productByMonth->month(date('n', strtotime($productByMonth->name))) !!}",
                                        @endforeach
                                    ],
                                    datasets: [{
                                        data: [
                                            @foreach ($productsByMonth as $productByMonth)
                                                "{!! $productByMonth->count !!}",
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
                                        yAxes: [{
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
                                @lang('transAdmin.prices-by-month')
                                <span class="text-secondary">(1 @lang('transAdmin.year'))</span>
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
                                type: 'bar',
                                data: {
                                    labels: [
                                        @foreach ($pricesByMonth as $priceByMonth)
                                            "{!! $priceByMonth->month(date('n', strtotime($priceByMonth->name))) !!}",
                                        @endforeach
                                    ],
                                    datasets: [{
                                        data: [
                                            @foreach ($pricesByMonth as $priceByMonth)
                                                "{!! $priceByMonth->count !!}",
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
                                        yAxes: [{
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
                                @lang('transAdmin.orders-by-month')
                                <span class="text-secondary">(1 @lang('transAdmin.year'))</span>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <canvas id="myChart4" width="100" height="65"></canvas>
                        </div>
                    </div>
                    @push('js')
                        <script>
                            var ctx = document.getElementById("myChart4");
                            var myChart4 = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: [
                                        @foreach ($ordersByMonth as $orderByMonth)
                                            "{!! $orderByMonth->month(date('n', strtotime($orderByMonth->name))) !!}",
                                        @endforeach
                                    ],
                                    datasets: [{
                                        data: [
                                            @foreach ($ordersByMonth as $orderByMonth)
                                                "{!! $orderByMonth->count !!}",
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
                                        yAxes: [{
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
            </div>
        </div>
    </div>
@endsection
