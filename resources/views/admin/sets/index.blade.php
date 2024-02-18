@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.products')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-3">
            @lang('transAdmin.sets')
        </div>
        <a href="{{ route('admin.products.sets.create') }}" class="btn btn-sm btn-primary">
            + @lang('transAdmin.set')
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <input type="text" class="form-control mb-4" id="customSearchBox" placeholder="@lang('transAdmin.search')..."
                    autofocus>
                <table class="table    " id="dt-table">
                    <thead>
                        <tr>
                            <th width="20%">@lang('transAdmin.name')</th>
                            <th>@lang('transAdmin.products')</th>
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
            color: #858796;
            background-color: #f8f9fc !important;
        }

        #dt-table_length,
        #dt-table_filter {
            display: none;
        }

        img {
            border-radius: unset !important;
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
                        url: "{!! route('admin.products.sets.api') !!}",
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
                            data: 'products',
                            orderable: false
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
