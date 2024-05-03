<footer class="site-footer">
    <div class="site-footer-bg" style="background-image: url(front/assets/images/backgrounds/site-footer-bg.png);">
    </div>
    <div class="container">
        <div class="site-footer__top pt-0 pb-0">
            <div class="row">
                <div class="col-xl-4 col-lg-6 mt-5 mb-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget__column footer-widget__about">
                        <div class="footer-widget__logo pb-3">
                            <a href="{!! route('index') !!}"><img
                                    src="{{ config('section')->getFirstMediaUrl('logos') }}" alt=""
                                    style="width: 350px"></a>
                        </div>
                        <div class="footer-widget__about-text-box">
                            <p class="footer-widget__about-text">{!! html_entity_decode(optional($contact)->slogan) !!}</p>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp footer-middle" data-wow-delay="400ms">

                </div>
                <div class="col-xl-4 col-lg-6 mt-5 mb-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget__column footer-widget__contact clearfix">
                        <h3 class="footer-widget__title">@lang('transFront.habarlashmak')</h3>
                        <ul class="footer-widget__contact-list list-unstyled clearfix">
                            <li>
                                <div class="icon">
                                    <span class="icon-email"></span>
                                </div>
                                <div class="text">
                                    <p><a
                                            href="mailto:{{ optional($contact)->email }}">{{ optional($contact)->email }}</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-pin"></span>
                                </div>
                                <div class="text">
                                    <p>{!! html_entity_decode(optional($contact)->address) !!}</p>
                                </div>
                            </li>
                            <li>

                                <div class="">
                                    <p class="site-footer__bottom-text">
                                        © {!! date('Y') !!} @lang('transFront.rights')<a href="#"></a>
                                    </p>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</footer>
