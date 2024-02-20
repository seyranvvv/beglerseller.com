@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.orders')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-3">
            @lang('transAdmin.orders')
        </div>
        <ul class="nav nav-tabs justify-content-end w-100">
            @foreach ($tracks as $track)
                <li class="nav-item">
                    <a class="nav-link  {!! $track->id == $curTrack->id ? 'active text-dark' : '' !!} text-primary"
                        href="{{ route('admin.orders.index.status', $track->id) }}">
                        <small>{!! $track->icon() !!}</small> {!! $track->getName() !!}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <input type="text" class="form-control mb-4" id="customSearchBox" placeholder="@lang('transAdmin.search')..."
                    autofocus>
                <table class="table" id="dt-table">
                    <thead>
                        <tr>
                            <th width="20%">@lang('transAdmin.customer')</th>
                            <th>@lang('transAdmin.products')</th>
                            <th>@lang('transAdmin.price')</th>
                            <th>@lang('transAdmin.datetime')</th>
                            <th>@lang('transAdmin.track')</th>
                            <th><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <style>
        mark {
            padding: 0;
            background-color: #FFEB3B;
        }

        .dataTables_empty {
            color: #adcbca;
            background-color: #f8f9fc !important;
        }

        #dt-table_length,
        #dt-table_filter {
            display: none;
        }
    </style>
    @push('js')
        <script>
            $(document).ready(function() {
                var table = $('#dt-table').DataTable({
                    processing: true,
                    serverSide: true,
                    lengthMenu: [5],
                    ajax: {
                        url: "{!! route('admin.orders.api', $curTrack->id) !!}",
                        dataType: "json",
                        type: "POST",
                        data: {
                            "_token": "{!! csrf_token() !!}"
                        }
                    },
                    columns: [{
                            data: 'customer',
                            orderable: false
                        },
                        {
                            data: 'products',
                            orderable: false
                        },
                        {
                            data: 'total_price'
                        },
                        {
                            data: 'created_at'
                        },
                        {
                            data: 'tracks',
                            orderable: false
                        },
                        {
                            data: 'action',
                            searchable: false,
                            orderable: false
                        },
                    ],
                    @if ($curTrack->id == 4)
                        order: [
                            [3, 'desc']
                        ],
                    @else
                        order: [
                            [3, 'asc']
                        ],
                    @endif
                    mark: true,
                    "language": {
                        @if (app()->getLocale() == 'fr')
                            "url": "{{ asset('js/datatables/tm.json') }}",
                        @elseif (app()->getLocale() == 'ru')
                            "url": "{{ asset('js/datatables/ru.json') }}",
                        @endif
                    }
                });

                var csb = document.getElementById('customSearchBox');
                var csbTimeout = null;
                csb.onkeyup = function(e) {
                    var that = this;
                    clearTimeout(csbTimeout);
                    csbTimeout = setTimeout(function() {
                        if (table.search() !== that.value) {
                            table.search(that.value).draw();
                        }
                    }, 500);
                };
            });
        </script>
    @endpush
@endsection
