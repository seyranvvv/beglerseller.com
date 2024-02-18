    <!--About One Start-->
    <section class="about-one">
        <a id="about" class="invisible" href="{{ route('about.index') }}"></a>
        <div class="about-one-bg wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-one__left">
                        <div class="about-one__img-box wow slideInLeft" data-wow-delay="100ms"
                            data-wow-duration="2500ms">
                            <div class="about-one__img">
                                <img src="{{ optional($about)->getFirstMediaUrl('about2') }}" alt="">
                            </div>
                            <div class="about-one__img-two">
                                <img src="{{ optional($about)->getFirstMediaUrl('about') }}" alt="">
                            </div>
                            <div class="about-one__experience">
                                {{-- <h2 class="about-one__experience-year">{{ optional($about)->years_number }}</h2> --}}
                                <h4 class="text-white">{{ optional($about)->years_text }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-one__right">
                        <div class="section-title text-left ">
                            <div class="section-sub-title-box ms-0 ms-sm-5">
                                <p class="section-sub-title">{{ config('section')->name }}</p>
                                <div class="section-title-shape-1 d-none d-sm-block">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}"
                                        alt="">
                                </div>
                                <div class="section-title-shape-2 d-none d-sm-block">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}"
                                        alt="">
                                </div>
                            </div>
                            <h2 class="section-title__title">{{ optional($about)->title }}</h2>
                        </div>
                        <p class="about-one__text-1 text-dark h6"> {!! html_entity_decode(optional($about)->content) !!}</p>

                        <div class="about-one__btn-call">
                            <div class="about-one__btn-box">
                                <a href="{{ route('about.index') }}"
                                    class="thm-btn about-one__btn">@lang('transFront.read_more')</a>
                            </div>
                            <div class="about-one__call">
                                <div class="about-one__call-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="about-one__call-content">
                                    <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About One End-->
