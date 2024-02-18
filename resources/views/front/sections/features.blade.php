<!--Feature One Start-->
<section class="feature-one">
    <div class="container">
        <div class="feature-one__inner">
            <div class="row">
                <!--Feature One Single Start-->
                @foreach ($icons as $icon)
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <div class="feature-one__single">
                            <div class="feature-one__single-inner">
                                <div class="feature-one__icon"><span>
                                        <img style="height: 65px" src="{{ $icon->getFirstMediaUrl('icon') }}"
                                            alt="{{ $icon->name }}">
                                    </span>
                                </div>
                                <div class="feature-one__count"></div>
                                <div class="feature-one__shape">

                                </div>
                                <h3 class="feature-one__title"><a
                                        href="{{ route('about.index') }}">{{ $icon->name }}</a></h3>
                                <p class="feature-one__text">{{ $icon->body }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--Feature One End-->
