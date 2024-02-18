<section class="tracking pt-5">
    <div class="container">
        <div class="tracking__inner">
            <div class="tracking-shape-1 float-bob-y">
                <img src="{{ asset('front/assets/images/shapes/tracking-shape-1.png') }}" alt="">
            </div>
            <div class="tracking-shape-2 float-bob-x">
                <img src="{{ asset('front/assets/images/shapes/tracking-shape-2.png') }}" alt="">
            </div>
            <div class="tracking-shape-3 float-bob-x">
                <img src="{{ asset('front/assets/images/shapes/tracking-shape-3.png') }}" alt="">
            </div>
            <div class="tracking-shape-4 float-bob-y">
                <img src="{{ asset('front/assets/images/shapes/tracking-shape-4.png') }}" alt="">
            </div>
            <div class="tracking__left">
                <div class="tracking__icon">
                    <span class="icon-folder"></span>
                </div>
                <div class="tracking__content">
                    <p class="tracking__sub-title">{{ $contactWith->getTitle() }}</p>
                    <h3 class="tracking__title">{!! html_entity_decode($contactWith->getBody()) !!}</h3>
                </div>
            </div>
            <div class="tracking__btn-box">
                <a href="{{ route('front.contact') }}" class="thm-btn tracking__btn">@lang('transFront.contact')</a>
            </div>
        </div>
    </div>
</section>
