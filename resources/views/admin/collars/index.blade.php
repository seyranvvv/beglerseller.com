@extends('admin.layouts.app')

@push('css')
    <style>
        .table td img {
            width: 100% !important;
            object-fit: cover;
            border-radius: 2px !important;
            height: 125px !important;
        }

        .collar-key {
            width: 97px;
            display: inline-block;
        }

        .collar-value {
            color: #686868;
            margin-left: 1rem;
        }
    </style>
@endpush

@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Ýakalar</h4>
        </div>

        <div class="d-flex align-items-center flex-wrap text-nowrap float-right">
            <a href="{{ route('collars.create') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0"><i data-feather="plus"
                    class="create-new-plus-icon"></i>Täze
                ýaka</a>
        </div>
        <div class="clearfix mb-3"></div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card articles">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="categoriesTable" class="table dataTable">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 35%">Ady</th>
                                        <th style="">Tikin Maşyn</th>
                                        <th style="">Bahasy</th>
                                        <th style="width: 10%">Tertip</th>
                                        <th style="width: 10%">Görkezilýär</th>
                                        <th style="width: 10%">Görüldi</th>
                                        <th style="width: 10%">Ýüklendi</th>
                                        <th style="width: 30%">Suraty</th>
                                        <th style="width: 10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collars as $collar)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $collar->name }} </td>
                                            <td> {{ $collar->machine_name }} </td>
                                            <td> {{ price_format($collar->price) }} </td>
                                            <td>{{ $collar->order }}</td>
                                            <td>{{ $collar->active ? 'Hawa' : 'Ýok' }}</td>
                                            <td>{{ $collar->views }}</td>
                                            <td>{{ $collar->downloads }}</td>
                                            <td><img src="{{ $collar->getFirstMediaUrl('collars') }}" alt="collar">
                                            </td>
                                            <td>
                                                <div class="chat-footer d-flex">
                                                    <a href="{{ route('collars.edit', $collar) }}"
                                                        class="btn border btn-icon rounded-circle mr-2"
                                                        data-toggle="tooltip" title="Üýtgetmek"
                                                        style="padding-top: 7px;padding-left: 1px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-edit text-muted">
                                                            <path
                                                                d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                            </path>
                                                            <path
                                                                d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('collars.destroy', $collar) }}" method="post"
                                                        class="delete-collar">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn border btn-icon rounded-circle mr-2"
                                                            data-toggle="tooltip" title="Pozmak">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-trash text-muted">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).on('submit', '.delete-collar', function(e) {
            if (!confirm('Siz hakykatdan hem pozmakçymy?')) {
                e.preventDefault();
            }
        });
    </script>
@endpush
