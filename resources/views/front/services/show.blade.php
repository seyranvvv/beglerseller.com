@extends('front.layouts.app')
@section('title')
    {{ optional($banner)->type->name }}
@endsection
@section('keywords')
    {{ optional($banner)->type->name }}
@endsection
@section('content')
    <!--Page Header Start-->

    <section class="page-header mb-5">
        <div class="page-header-bg" style="background-image: url({{ optional($banner)->getFirstMediaUrl('banners') }})">
        </div>
        <div class="page-header-shape-1"></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('index') }}">@lang('transFront.home')</a></li>
                    <li><span>/</span></li>
                    <li>{{ optional($banner)->type->name }}</li>
                </ul>
                <h2>{{ $service->title }}</h2>
            </div>
        </div>
    </section>



    <!--Why Choose Two Start-->
    <section class="why-choose-two">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="why-choose-two__left">
                        {{-- <div class="section-title text-left"> --}}
                        {{-- <div class="section-sub-title-box">
                                <p class="section-sub-title">@lang('transFront.services')</p>
                                <div class="section-title-shape-1">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}"
                                        alt="">
                                </div>
                                <div class="section-title-shape-2">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}"
                                        alt="">
                                </div>
                            </div> --}}
                        {{-- <h2 class="section-title__title">{{ $service->getTitle() }}</h2> --}}
                        {{-- </div> --}}
                        <p class="why-choose-two__text"> {!! html_entity_decode($service->content) !!}</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="why-choose-two__right benefits-two__img">
                        <img src="{{ $service->getFirstMediaUrl('services') }}" alt="{{ $service->image_en }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Why Choose Two End-->

    {{--  <!--Benefits Two Start-->
    <section class="benefits-two">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="benefits-two__left">
                        <div class="benefits-two__img">
                            <img src="{!! Request::root() !!}{!! Storage::disk('local')->url("serviceAbout/image/".$serviceAbout->img) !!}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="benefits-two__right">
                        <div class="section-title text-left">
                            <div class="section-sub-title-box">
                                <p class="section-sub-title">@lang('transFront.our_services_and_products')</p>
                                <div class="section-title-shape-1">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}" alt="">
                                </div>
                                <div class="section-title-shape-2">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}" alt="">
                                </div>
                            </div>
                            <h2 class="section-title__title">{{ $serviceAbout->getTitle() }}
                            </h2>
                        </div>
                        <ul class="list-unstyled benefits-two__points">


                            @foreach ($services as $service)
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p><a href="{!! route('front.service.service_single', $service->slug) !!}">{{ $service->getTitle() }}</a></p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Benefits Two End--> --}}
@endsection
