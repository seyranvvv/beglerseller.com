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
        <div class="float-left d-flex ">
            <h4 class="mb-3 mb-md-0 ">Ulanyjy ({{ $user->phone }})</h4>
            <div class="d-flex flex-column justify-content-center">
                <div class="{{ $user->online_at && $user->online_at > now() ? 'online' : 'offline' }}">
                </div>
            </div>
        </div>
        <div class="float-right  d-flex flex-row justify-content-between">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">+ Depozit</button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="deposit" name="deposit"
                                action="{{ route('users.deposit.add', $user) }}" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Depozit (TMT)</label>
                                    <input min="1" type="number" name="amount" class="form-control"
                                        id="exampleInputUsername1" autocomplete="off" placeholder="0 TMT">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Ýap</button>
                            <button type="submit" form="deposit" class="btn btn-primary">Depozit
                                goş</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix mb-3"></div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card articles">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="card ">
                                    <div class="card-body overflow-auto" style="height: 779px;">
                                        <h6 class="card-title">Depozit/Sargyt taryhy</h6>
                                        <div id="content ">
                                            <ul class="timeline ">
                                                @foreach ($records as $key => $record)
                                                    <li class="event"
                                                        data-date="{{ $record->created_at->format('d.m.y H:i') }}">
                                                        <h3
                                                            class="{{ class_basename($record) == 'Deposit' ? 'text-warning' : 'text-danger' }} ">
                                                            {{ class_basename('Deposit') == 'Deposit' ? 'Depozit' : 'Töleg' }}
                                                        </h3>
                                                        <p class=" ">
                                                            {{ $record->amount }}
                                                            tmt </p>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
