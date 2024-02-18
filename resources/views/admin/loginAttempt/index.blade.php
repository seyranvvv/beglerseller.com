@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.login-attempts')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-3">@lang('transAdmin.login-attempts')</div>
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
                            <th>@lang('transAdmin.username')</th>
                            <th>@lang('transAdmin.enable')</th>
                            <th>@lang('transAdmin.datetime')</th>
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
                        url: "{!! route('admin.login-attempts.api') !!}",
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
                            data: 'username'
                        },
                        {
                            data: 'status',
                            searchable: false
                        },
                        {
                            data: 'created_at'
                        },
                    ],
                    order: [
                        [0, 'desc']
                    ],
                    mark: true,
                    "language": {
                        @if (app()->getLocale() == 'tm')
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
