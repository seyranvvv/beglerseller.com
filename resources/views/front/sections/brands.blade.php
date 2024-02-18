<!--Brand One Start-->
<section class="brand-one">
    <div class="container-fluid">
        <div class="row">

            <div class="col-xl-12">
                <div class="brand-one__main-content">
                    <div class="thm-swiper__slider swiper-container"
                        data-swiper-options='{"spaceBetween": 100, "loop": true, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                        "0": {
                            "spaceBetween": 30,
                            "slidesPerView": 2
                        },
                        "375": {
                            "spaceBetween": 30,
                            "slidesPerView": 2
                        },
                        "575": {
                            "spaceBetween": 30,
                            "slidesPerView": 3
                        },
                        "767": {
                            "spaceBetween": 50,
                            "slidesPerView": 4
                        },
                        "991": {
                            "spaceBetween": 50,
                            "slidesPerView": 5
                        },
                        "1199": {
                            "spaceBetween": 100,
                            "slidesPerView": 5
                        }
                    }}'>
                        <div class="swiper-wrapper">
                            @foreach ($brands as $brand)
                                <div class="swiper-slide">
                                    <img class="w-100 h-auto" src="{{ $brand->getFirstMediaUrl('brands') }}"
                                        alt="">
                                </div><!-- /.swiper-slide -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Brand One End-->
