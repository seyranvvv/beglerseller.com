@extends('front.layouts.app')
@section('title')
    {{ optional(optional($banner)->type)->name }}
@endsection
@section('keywords')
    {{ optional(optional($banner)->type)->name }}
@endsection
@section('content')
    <!--Page Header Start-->
    @include('front.products.banner')

    <!--Insurance Page One Start-->

    <!--Product Start-->
    <section class="product">
        <div class="container">
            <div class="row">
                @include('front.products.index.categories')


                <div class="col-xl-9 col-lg-9">
                    @include('front.products.index.products')
                    <div class="d-flex justify-content-center">
                        {!! $products->withQueryString()->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Product End-->

    <!--Insurance Page One End-->
@endsection
