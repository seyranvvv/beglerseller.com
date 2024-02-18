@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.locations')
@endsection
@section('content')
    <div class="d-flex flex-column ">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Ýer goşmak</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.locations.index') }}">Ýerlar</a></li>
                <li class="breadcrumb-item active">Ýer goşmak</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <form action="{{ route('admin.locations.store') }}" method="post">
                    {!! csrf_field() !!}


                    <div class="row">
                        <div class="col-md-6">
                            @include('admin.form-items.name.create.tm')
                            @include('admin.form-items.name.create.ru')
                            @include('admin.form-items.name.create.en')
                            <div class=" form-group">
                                <label for="shipping_fee" class=" col-form-label text-md-right">
                                    @lang('transAdmin.shipping-fee') <span class="text-danger">*</span>
                                </label>
                                <div class="">
                                    <input id="shipping_fee" type="number" min="0"
                                        class="form-control{{ $errors->has('shipping_fee') ? ' is-invalid' : '' }}"
                                        name="shipping_fee" value="{{ old('shipping_fee') }}" required>
                                    @if ($errors->has('shipping_fee'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('shipping_fee') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class=" form-group">
                                <label for="min_order_fee" class=" col-form-label text-md-right">
                                    @lang('transAdmin.min-order-fee') <span class="text-danger">*</span>
                                </label>
                                <div class="">
                                    <input id="min_order_fee" type="number" min="0"
                                        class="form-control{{ $errors->has('min_order_fee') ? ' is-invalid' : '' }}"
                                        name="min_order_fee" value="{{ old('min_order_fee') }}" required>
                                    @if ($errors->has('min_order_fee'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('min_order_fee') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            @include('admin.form-items.sort_order.create')



                            @include('admin.form-items.status.create')



                        </div>
                    </div>









                    <button type="submit" class="btn btn-primary mr-2">Goş</button>

                </form>
            </div>
        </div>
    </div>
@endsection
