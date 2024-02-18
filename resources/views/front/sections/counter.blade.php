{{-- <!--Counter One Start--> --}}
<Section class="counter-one">
    <div class="counter-one-shape-1 float-bob-y">
        <img src="{{ asset('front/assets/images/shapes/counter-one-shape-1.png') }}" alt="">
    </div>
    <div class="counter-one-shape-2 float-bob-y">
        <img src="{{ asset('front/assets/images/shapes/counter-one-shape-2.png') }}" alt="">
    </div>
    <div class="container">
        <div class="row overflow-hidden">
            <!--Counter One Single Start-->
            @foreach ($counters as $counter)
                <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="counter-one__single">
                        <div class="counter-one__top">
                            <div class="counter-one__icon">
                                <img src="{{ $counter->getFirstMediaUrl('icon') }}" alt="{{ $counter->name }}"
                                    width="60px">
                            </div>
                            <div class="counter-one__count-box" style="overflow: hidden">
                                <div class="counter-one__count-box-inner">
                                    <h3 class="odometer" data-count="{{ $counter->counter_number }}">00</h3>
                                    <span class="counter-one__plus">{{ $counter->counter_text }}</span>
                                </div>
                            </div>
                        </div>
                        <p class="counter-one__text">{{ $counter->body }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</Section>
<!--Counter One End-->
