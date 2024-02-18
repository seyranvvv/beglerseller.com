@extends('front.layouts.app')
@section('title')
    {{ optional($banner)->type->name }}
@endsection
@section('keywords')
    {{ optional($banner)->type->name }}
@endsection
@section('content')
    <!--Page Header Start-->
    @include('front.sections.banner')

    <!--Insurance Page One Start-->
    <section class="insurance-page-one">
        <div class="services-one__container">
            <div class="row">
                <!--Services One Single Start-->
                @foreach ($services as $service)
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="services-one__single">
                            <div class="service-one__img">
                                <img src="{{ $service->getFirstMediaUrl('services') }}" alt="">
                            </div>
                            <div class="service-one__content">
                                <div class="services-one__icon">
                                    <img src="{{ $service->getFirstMediaUrl('icon') }}" alt="" width="50px">
                                </div>
                                <h2 class="service-one__title line-clamp-2"><a
                                        href="{!! route('services.show', $service) !!}">{{ $service->title }}</a>
                                </h2>
                                <p class="service-one__text line-clamp-4">{!! strip_tags(html_entity_decode($service->content)) !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Insurance Page One End-->
@endsection
