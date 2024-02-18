    <!--Why Choose One Start-->
    <section class="why-choose-one">
        <div class="why-choose-one-shape-1"
            style="background-image: url({{ asset('front/assets/images/shapes/why-choose-one-shape-1.png') }});"></div>
        <div class="why-choose-one-shape-2 float-bob-y">
            <img src="{{ asset('front/assets/images/shapes/why-choose-one-shape-2.png') }}" alt="">
        </div>
        <div class="why-choose-one-shape-3 float-bob-x">
            <img src="{{ asset('front/assets/images/shapes/why-choose-one-shape-3.png') }}" alt="">
        </div>
        <div class="why-choose-one-shape-4 float-bob-y">
            <img src="{{ asset('front/assets/images/shapes/why-choose-one-shape-4') }}')}}" alt="">
        </div>
        <div class="why-choose-one-shape-5 float-bob-y">
            <img src="{{ asset('front/assets/images/shapes/why-choose-one-shape-5.png') }}" alt="">
        </div>
        <div class="why-choose-one-shape-6 float-bob-x">
            <img src="{{ asset('front/assets/images/shapes/why-choose-one-shape-6.png') }}" alt="">
        </div>
        <div class="why-choose-one-img wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
            <img src="{!! Request::root() !!}{!! Storage::disk('local')->url('why-choose-us/image/' . $whyChooseUs->img) !!}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7">
                    <div class="why-choose-one__left">
                        <div class="section-title text-left">
                            <div class="section-sub-title-box">
                                <p class="section-sub-title">{{ $whyChooseUs->getTitle() }}</p>
                                <div class="section-title-shape-1">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-3.png') }}"
                                        alt="">
                                </div>
                                <div class="section-title-shape-2">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-4.png') }}"
                                        alt="">
                                </div>
                            </div>
                            <h2 class="section-title__title">{!! $whyChooseUs->getName() !!}</h2>
                        </div>
                        <p class="why-choose-one__text">{!! $whyChooseUs->getBody() !!}</p>
                        <div class="why-choose-one__list-box">
                            <ul class="list-unstyled why-choose-one__list" style="align-items: unset !important">
                                @foreach ($chooseIcons as $icon)
                                    <li>
                                        <div class="why-choose-one__single h-100">
                                            <div class="why-choose-one__list-icon">
                                                <img src="{{ Storage::disk('local')->url('icon/' . $icon->icon) }}"
                                                    alt="{{ $icon->icon }}" width="60px">
                                            </div>
                                            <div class="why-choose-one__list-title-box">
                                                <div class="why-choose-one__list-title-inner">
                                                    <h3 class="why-choose-one__list-title">{{ $icon->getName() }}</h3>
                                                </div>
                                                <div class="why-choose-one__list-text-box">
                                                    <p class="why-choose-one__list-text">{{ $icon->getText() }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Why Choose One End-->
