    <!--Insurance Page Two Start-->
    @if ($vacancies->count() != 0)
        <section class="insurance-page-two">
            <div class="container">
                <div class="row">
                    <div class="section-title text-right">

                        <div class="section-sub-title-box">
                            <p class="section-sub-title">@lang('transFront.vacancies')</p>
                            <div class="section-title-shape-1">
                                <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}"
                                    alt="">
                            </div>
                            <div class="section-title-shape-2">
                                <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    @foreach ($vacancies as $vacancy)
                        <!--Services Two Single Start-->
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="services-two__single">
                                <div class="services-two__icon-box">
                                    <img src="{!! Request::root() !!}{!! Storage::disk('local')->url('vacancy/image/' . $vacancy->img) !!}" alt=""
                                        style="width: 80px;">
                                </div>
                                <h3 class="services-two__title"><a href="#">{{ $vacancy->getTitle() }}</a></h3>
                                <p class="services-two__text">{!! html_entity_decode($vacancy->getName()) !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--Insurance Page Two End-->
