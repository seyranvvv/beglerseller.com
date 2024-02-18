@extends('admin.layouts.app')

@push('css')
    <style>
        .table td img {
            width: 100% !important;
            object-fit: cover;
            border-radius: 2px !important;
            height: 125px !important;
        }

        .user-key {
            width: 97px;
            display: inline-block;
        }

        .user-value {
            color: #686868;
            margin-left: 1rem;
        }

        .online {
            margin-left: 12px;
            height: 10px;
            width: 10px;
            border-radius: 50%;
            background: #36e800;
        }

        .offline {
            margin-left: 12px;
            height: 10px;
            width: 10px;
            border-radius: 50%;
            background: #ff2936;
        }
    </style>
@endpush

@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Ulanyjylar</h4>
        </div>

        <div class="clearfix mb-3"></div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card articles">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="usersTable" class="table dataTable">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 35%">Telefon belgisi</th>
                                        <th style="">OTP</th>
                                        <th style="">Jemi depozit</th>
                                        <th style="">Sargytlary</th>
                                        <th style=""></th>
                                        {{--   <th style="width: 10%">Tertip</th>
                                        <th style="width: 10%">Görkezilýär</th>
                                        <th style="width: 10%">Görüldi</th>
                                        <th style="width: 30%">Suraty</th> --}}
                                        <th style="width: 10%"></th>
                                    </tr>
                                </thead>
                                {{-- @dd($users->first()->on) --}}
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex flex-row justify-content-start">
                                                    <div class="">{{ $user->phone }} </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <div
                                                            class="{{ $user->online_at && $user->online_at > now() ? 'online' : 'offline' }}">
                                                        </div>
                                                    </div>

                                                </div>

                                            </td>
                                            <td> {{ $user->otp }} </td>
                                            <td> {{ $user->deposits()->sum('amount') }} TMT</td>
                                            <td> {{ $user->orders()->count() }} ({{ $user->orders()->count() }} TMT)</td>
                                            {{-- <td>{{ $user->order }}</td>
                                            <td>{{ $user->active ? 'Hawa' : 'Ýok' }}</td>
                                            <td>{{ $user->views }}</td>
                                            <td><img src="{{ $user->getFirstMediaUrl('users') }}" alt="user">
                                            </td> --}}
                                            <td>
                                                <div class="chat-footer d-flex">
                                                    <a href="{{ route('users.show', $user) }}"
                                                        class="btn border btn-icon rounded-circle mr-2"
                                                        data-toggle="tooltip" title="Giňişleýin"
                                                        style="padding-top: 7px;padding-left: 1px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-info text-muted">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <line x1="12" y1="16" x2="12"
                                                                y2="12"></line>
                                                            <line x1="12" y1="8" x2="12.01"
                                                                y2="8"></line>
                                                        </svg>
                                                    </a>

                                                    {{-- <form action="{{ route('users.destroy', $user) }}" method="post"
                                                        class="delete-user">
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
                                                    </form> --}}
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
        $(document).on('submit', '.delete-user', function(e) {
            if (!confirm('Siz hakykatdan hem pozmakçymy?')) {
                e.preventDefault();
            }
        });
    </script>
@endpush
