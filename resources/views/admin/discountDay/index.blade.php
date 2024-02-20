@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.discount-days')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-3">@lang('transAdmin.discount-days')</div>
        <a href="{{ route('admin.discount-days.create') }}" class="btn btn-primary">
            + @lang('transAdmin.discount-day')
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <input type="text" class="form-control mb-4" id="customSearchBox" placeholder="@lang('transAdmin.search')..."
                    autofocus>
                <table class="table" id="dt-table">
                    <thead>
                        <tr>
                            <th>@lang('transAdmin.name')</th>
                            <th>@lang('transAdmin.discount-percent')</th>
                            <th>@lang('transAdmin.datetime-start')</th>
                            <th>@lang('transAdmin.datetime-end')</th>
                            <th>@lang('transAdmin.enable')</th>
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
                    lengthMenu: [10],
                    ajax: {
                        url: "{!! route('admin.discount-days.api') !!}",
                        dataType: "json",
                        type: "POST",
                        data: {
                            "_token": "{!! csrf_token() !!}"
                        }
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'percent'
                        },
                        {
                            data: 'datetime_start'
                        },
                        {
                            data: 'datetime_end'
                        },
                        {
                            data: 'status'
                        },
                        {
                            data: 'action',
                            searchable: false,
                            orderable: false
                        },
                    ],
                    order: [
                        [0, 'desc']
                    ],
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
