@extends('front.layouts.app')
@section('title')
    {{ optional($banner)->type->name }}
@endsection
@section('keywords')
    {{ optional($banner)->type->name }}
@endsection
@push('css')
    <style>
        .brand-card {
            /* border: 1px solid var(--insur-gray); */
            border-radius: 16px;
        }
    </style>
@endpush
@section('content')
    <!--Page Header Start-->
    @include('front.brands.banner')

    <!--Insurance Page One Start-->
    <section class="insurance-page-one">
        <div class="services-one__container">
            <div class="row">
                <!--Services One Single Start-->
                @foreach ($brands as $brand)
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="services-one__single">
                            <div class="service-one__img brand-card">
                                <img src="{{ $brand->getFirstMediaUrl('brands') }}" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Insurance Page One End-->
@endsection
