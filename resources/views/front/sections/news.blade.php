<!--News One Start-->
<section class="news-one">
    <div class="container">
        <div class="section-title text-center">
            <div class="section-sub-title-box">
                <p class="section-sub-title">@lang('transAdmin.posts')</p>
                <div class="section-title-shape-1">
                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}" alt="">
                </div>
                <div class="section-title-shape-2">
                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}" alt="">
                </div>
            </div>
            {{-- <h2 class="section-title__title">@lang</h2> --}}
        </div>
        <div class="row">
            <!--News One Single Start-->
            @foreach ($posts as $post)
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                    <div class="news-one__single">
                        <div class="news-one__img">
                            <img src="{{ $post->getFirstMediaUrl('posts') }}" alt="">

                            <div class="news-one__arrow-box">
                                <a href="{!! route('posts.show', $post) !!}" class="news-one__arrow">
                                    <span class="icon-right-arrow1"></span>
                                </a>
                            </div>
                        </div>
                        <div class="news-one__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="{!! route('posts.show', $post) !!}"><i class="far fa-calendar"></i>
                                        {!! $post->publishedAt() !!} </a>
                                </li>
                            </ul>
                            <h3 class="news-one__title"><a href="{!! route('posts.show', $post) !!}">{!! $post->title !!}</a>
                            </h3>
                            <p class="news-one__text">{!! str_limit(strip_tags(html_entity_decode($post->content)), 100) !!}</p>
                            <div class="news-one__read-more">
                                <a href="{!! route('posts.show', $post) !!}">@lang('transFront.read_more')
                                    <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--News One End-->
