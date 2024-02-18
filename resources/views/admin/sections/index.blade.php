@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.brands')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between ">
        <div class="h3 mb-3">@lang('transAdmin.brands')</div>
        <a href="{{ route('admin.brands.create') }}" class="btn btn-sm btn-primary">
            + @lang('transAdmin.brand')
        </a>
    </div>
    <div class="card">
        <div class="card-body">


            <div class="my-4">
                <input type="text" class="form-control mb-4" id="customSearchBox" placeholder="@lang('transAdmin.search')..."
                    autofocus>
                <table class="table " id="dt-table">
                    <thead>
                        <tr>
                            <th>@lang('transAdmin.name')</th>
                            <th>@lang('transAdmin.image')</th>
                            <th>@lang('transAdmin.products')</th>
                            <th>@lang('transAdmin.enable')</th>
                            <th><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    {{-- <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatables.mark.js') }}"></script> --}}

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
                        url: "{!! route('admin.brands.api') !!}",
                        dataType: "json",
                        type: "POST",
                        data: {
                            "_token": "{!! csrf_token() !!}"
                        }
                    },
                    columns: [{
                            data: 'name'
                        },
                        {
                            data: 'image'
                        },

                        {
                            data: 'sets_count'
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
                        [0, 'asc']
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
