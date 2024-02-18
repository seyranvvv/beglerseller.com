@extends('front.layouts.app')
@section('title')
    {{ optional($product)->title }} | {{ optional(optional($banner)->type)->name }}
@endsection
@section('keywords')
    {{ optional($product)->title }}, {{ optional(optional($banner)->type)->name }}
@endsection
@section('content')
    <!--Page Header Start-->
    @include('front.sections.banner')

    <!--Insurance Page One Start-->


    <!--Product Details Start-->
    <section class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6">
                    <div class="row">

                        <div class="col-lg-9">
                            <div class="product-details__img js--currentImage cursor-pointer">
                                <img src="{{ $product->getfirstMediaUrl('products') }}" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-3 ">
                            <div class="d-flex flex-lg-column flex-row  justify-content-between h-100">
                                @for ($i = 2; $i < 5; $i++)
                                    @if ($product->getfirstMediaUrl('products_' . $i))
                                        <div class="product-details__img js--singleImage cursor-pointer">
                                            <img src="{{ $product->getfirstMediaUrl('products_' . $i) }}" alt="" />
                                        </div>
                                    @endif
                                @endfor
                            </div>

                        </div>


                    </div>

                </div>
                <div class="col-lg-6 col-xl-6">
                    <div class="product-details__top">
                        <h3 class="product-details__title">{{ $product->title }} </h3>
                    </div>

                    <div class="product-details__content">
                        {!! $product->content !!}
                    </div>
                    <div class="about-one__btn-box mt-4">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#requestModal"
                            class="thm-btn about-one__btn border-0">@lang('transFront.order')</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Product Details End-->

    <!--Product Description Start-->
    <section class="product-description">


    </section>
    <!--Product Description End-->


    <!--Insurance Page One End-->
@endsection
