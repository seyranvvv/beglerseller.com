<!--News One Start-->
<section class="news-one">
    <div class="container">
        <div class="section-title text-center">
            <div class="section-sub-title-box">
                <p class="section-sub-title">@lang('transAdmin.categories')</p>
                <div class="section-title-shape-1">
                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}" alt="">
                </div>
                <div class="section-title-shape-2">
                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}" alt="">
                </div>
            </div>
            {{-- <h2 class="section-title__title">@lang</h2> --}}
        </div>
        <div class="services-one__bottom">
            <div class="services-one__container">
                <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2">
                    @foreach ($categories as $category)
                        <!--Services One Single Start-->
                        <div class="col wow fadeInUp" data-wow-delay="100ms">
                            <div class="services-one__single ">
                                <a class="d-block " href="{{ route('products.index', ['category' => $category->id]) }}">
                                    <div class="service-one__img rounded-0">

                                        <img class="p-3" src="{{ $category->getFirstMediaUrl('categories') }}"
                                            alt="">
                                    </div>
                                    <div class="service-one__content bg-dark py-3 rounded-0 ">

                                        <h2 class="service-one__title line-clamp-2 link-light text-center ">
                                            {{ $category->name }}
                                        </h2>
                                    </div>
                                </a>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--News One End-->
