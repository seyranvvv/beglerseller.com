@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.orders')
@endsection
@section('content')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}" /> --}}




    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Sargyt görmek</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Sargytlar</a></li>
                <li class="breadcrumb-item active">Sargyt тüýtgetmek</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <form action="{{ route('admin.orders.update', $obj->id) }}" method="post">
                    {!! method_field('PUT') !!}
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class=" form-group">
                                <label for="location" class=" col-form-label text-md-right">
                                    @lang('transAdmin.location') <span class="text-danger">*</span>
                                </label>
                                <div class="">
                                    <select id="location"
                                        class="form-control  {{ $errors->has('location') ? ' is-invalid' : '' }} select2"
                                        name="location" required autofocus>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}">
                                                {{ $location->getName() }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('location'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('location') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class=" form-group">
                                <label for="full_name" class=" col-form-label text-md-right">
                                    @lang('transAdmin.full-name') <span class="text-danger">*</span>
                                </label>
                                <div class="">
                                    <input id="full_name" type="text"
                                        class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}"
                                        name="full_name" value="{{ $obj->full_name }}" required>
                                    @if ($errors->has('full_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('full_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class=" form-group">
                                <label for="phone" class="ol-form-label text-md-right">
                                    @lang('transAdmin.phone') <span class="text-danger">*</span>
                                </label>
                                <div class="">
                                    <input id="phone" type="number" min="60000000" max="65999999"
                                        class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                        value="{{ $obj->phone }}" required>
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class=" form-group">
                                <label for="address" class=" col-form-label text-md-right">
                                    @lang('transAdmin.address') <span class="text-danger">*</span>
                                </label>
                                <div class="">
                                    <textarea id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"
                                        rows="3" required>{{ $obj->address }}</textarea>
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class=" form-group">
                                <label for="note" class=" col-form-label text-md-right">
                                    @lang('transAdmin.note')
                                </label>
                                <div class="">
                                    <textarea id="note" class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}" name="note"
                                        rows="3">{{ $obj->note }}</textarea>
                                    @if ($errors->has('note'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('note') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class=" form-group">
                                <label for="date_delivery" class="">
                                    @lang('transAdmin.date-delivery') <span class="text-danger">*</span>
                                </label>
                                <div class="input-group date datepicker" id="datePickerExample">
                                    <input name="date_delivery" type="text"
                                        value="{{ old('date_delivery', $obj->date_delivery->format('d.m.Y')) }}"
                                        class="form-control"><span class="input-group-addon"><i
                                            data-feather="calendar"></i></span>
                                </div>
                            </div>

                            <div class=" form-group">
                                <label for="discount_day_percent" class=" col-form-label text-md-right">
                                    @lang('transAdmin.discount-percent') <span class="text-danger">*</span>
                                </label>
                                <div class="c">
                                    <input id="discount_day_percent" type="number" min="0"
                                        class="form-control{{ $errors->has('discount_day_percent') ? ' is-invalid' : '' }}"
                                        name="discount_day_percent" value="{{ $obj->discount_day_percent }}" required>
                                    @if ($errors->has('discount_day_percent'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('discount_day_percent') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class=" form-group">
                                <label for="payment_method" class=" col-form-label text-md-right">
                                    @lang('transAdmin.payment-method') <span class="text-danger">*</span>
                                </label>
                                <div class="">
                                    <select id="payment_method"
                                        class="form-control {{ $errors->has('payment_method') ? ' is-invalid' : '' }} select2"
                                        name="payment_method" required>
                                        <option value="1"
                                            {{ 1 == $obj->payment_method ? 'selected="selected"' : '' }}>
                                            @lang('transAdmin.cash-payment')
                                        </option>
                                        <option value="2"
                                            {{ 2 == $obj->payment_method ? 'selected="selected"' : '' }}>
                                            @lang('transAdmin.terminal-payment')
                                        </option>
                                        <option value="3"
                                            {{ 3 == $obj->payment_method ? 'selected="selected"' : '' }}>
                                            @lang('transAdmin.online-payment')
                                        </option>
                                    </select>
                                    @if ($errors->has('payment_method'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('payment_method') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- submit button --}}
                    <button type="submit" class="btn btn-primary mr-2">Üýtget</button>

                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2({

            });
        });
    </script>
@endpush
