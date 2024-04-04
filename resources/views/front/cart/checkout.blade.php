@extends('front.layouts.app')
@section('title')
    {{ trans('transFront.cart') }}
@endsection
@section('keywords')
    {{ trans('transFront.cart') }}
@endsection

@push('css')
    <style>
        .custom-btn {
            border: none;
        }
    </style>
@endpush
@section('content')
    <!--Page Header Start-->
    @include('front.sections.banner')

    <!--Insurance Page One Start-->


    <!--Start Checkout Page-->
    <section class="checkout-page">
        <div class="container">
            <div class="row m-auto">
                <div class="col-xl-6 col-lg-6">
                    <form class="billing_details_form" action="{{ route('cart.order') }}" method="POST">
                        @csrf
                        <div class="billing_details">
                            <div class="billing_title">
                                <p>Returning Customer? <span>Click here to Login</span></p>
                                <h2>Billing details</h2>
                            </div>
                            <div class="row bs-gutter-x-20">
                                <div class="col-xl-6">
                                    <div class="billing_input_box">
                                        <input type="text" name="first_name" value="" placeholder="First name"
                                            required="">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="billing_input_box">
                                        <input type="text" name="last_name" value="" placeholder="Last name"
                                            required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row bs-gutter-x-20">
                                <div class="col-xl-6">
                                    <div class="billing_input_box">
                                        <input name="email" type="email" placeholder="Email address">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="billing_input_box">
                                        <input type="tel" name="phone"
                                         {{-- pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" --}}
                                            required="" placeholder="Phone">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-left d-flex justify-content-start mt-2">
                            <input type="submit" class="thm-btn custom-btn" value="Place Your Order">
                        </div><!-- /.text-right -->
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--End Checkout Page-->



    <!--Insurance Page One End-->
@endsection

@push('js')
@endpush
