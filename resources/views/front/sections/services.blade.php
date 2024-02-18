    <!--Services One Start-->
    <section class="services-one">
        <div class="services-one__top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <div class="services-one__top-left">
                            <div class="section-title text-left">
                                <div class="section-sub-title-box">
                                    <p class="section-sub-title">@lang('transFront.our_services_and_products')</p>
                                    <div class="section-title-shape-1">
                                        <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}"
                                            alt="">
                                    </div>
                                    <div class="section-title-shape-2">
                                        <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}"
                                            alt="">
                                    </div>
                                </div>
                                {{-- <h2 class="section-title__title">{{ $service_text_one->getName() }}</h2> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="services-one__top-right">
                            {{-- <p class="services-one__top-text">{{ $service_text_two->getName() }}</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="services-one__bottom">
            <div class="services-one__container">
                <div class="row">
                    @foreach ($services as $service)
                        <!--Services One Single Start-->
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="services-one__single">
                                <div class="service-one__img">
                                    <img src="{{ $service->getFirstMediaUrl('services') }}" alt="">
                                </div>
                                <div class="service-one__content">
                                    <div class="services-one__icon">
                                        <img src="{{ $service->getFirstMediaUrl('icon') }}" alt=""
                                            width="50px">
                                    </div>
                                    <h2 class="service-one__title line-clamp-2"><a
                                            href="{!! route('services.show', $service) !!}">{{ $service->title }}</a>
                                    </h2>
                                    <p class="service-one__text line-clamp-4">{!! str_limit(strip_tags(html_entity_decode($service->content)), 100) !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--Services One End-->
