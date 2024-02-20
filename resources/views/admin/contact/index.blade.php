@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.contacts')
@endsection
@section('content')
    {{-- <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatables.mark.js') }}"></script> --}}

    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-3">@lang('transAdmin.contacts')</div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <input type="text" class="form-control mb-4" id="customSearchBox" placeholder="@lang('transAdmin.search')..."
                    autofocus>
                <table class="table" id="dt-table">
                    <thead>
                        <tr>
                            <th>@lang('transAdmin.full-name')</th>
                            <th width="40%">@lang('transAdmin.contact')</th>
                            <th>@lang('transAdmin.ip-address') / @lang('transAdmin.user-agent')</th>
                            <th>@lang('transAdmin.datetime')</th>
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
                        url: "{!! route('admin.contacts.api') !!}",
                        dataType: "json",
                        type: "POST",
                        data: {
                            "_token": "{!! csrf_token() !!}"
                        }
                    },
                    columns: [{
                            data: 'full_name'
                        },
                        {
                            data: 'message'
                        },
                        {
                            data: 'ia_ua',
                            orderable: false
                        },
                        {
                            data: 'created_at'
                        },
                        {
                            data: 'action',
                            searchable: false,
                            orderable: false
                        },
                    ],
                    order: [
                        [3, 'desc']
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
