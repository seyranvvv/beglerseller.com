@extends('front.layouts.app')
@section('title')
    @lang('transFront.favorites')
@endsection
@section('keywords')
    @lang('transFront.favorites')
@endsection
@section('content')
    <!--Page Header Start-->
    @include('front.products.banner')

    <!--Insurance Page One Start-->

    <!--Product Start-->
    <section class="product">
        <div class="container">
            <div class="row">
                @if ($products->count() > 0)
                <div class="col-xl-12 col-lg-12">
                    @include('front.products.index.products')
                    <div class="d-flex justify-content-center">
                        {!! $products->withQueryString()->links() !!}
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-md-12 mycard py-5 text-center">
                        <div class="mycards">
                            <h4>@lang('transFront.favorites_text')</h4>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!--Product End-->

    <!--Insurance Page One End-->
@endsection
