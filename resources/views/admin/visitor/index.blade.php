@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.visitors')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-3">@lang('transAdmin.visitors')</div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <input type="text" class="form-control mb-4" id="customSearchBox" placeholder="@lang('transAdmin.search')..."
                    autofocus>
                <table class="table" id="dt-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>@lang('transAdmin.ip-address')</th>
                            <th>@lang('transAdmin.user-agent')</th>
                            <th>@lang('transAdmin.hits')</th>
                            <th>@lang('transAdmin.suspect-hits')</th>
                            <th>@lang('transAdmin.visitor')</th>
                            <th>@lang('transAdmin.enable')</th>
                            <th>@lang('transAdmin.datetime-start')</th>
                            <th>@lang('transAdmin.datetime-end')</th>
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
                        url: "{!! route('admin.visitors.api') !!}",
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
                            data: 'ip_address',
                            orderable: false
                        },
                        {
                            data: 'user_agent',
                            orderable: false
                        },
                        {
                            data: 'hits'
                        },
                        {
                            data: 'suspect_hits'
                        },
                        {
                            data: 'api'
                        },
                        {
                            data: 'robot'
                        },
                        {
                            data: 'created_at'
                        },
                        {
                            data: 'updated_at'
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
