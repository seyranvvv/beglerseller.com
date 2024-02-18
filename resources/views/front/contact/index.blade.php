@extends('front.layouts.app')
@section('title')
    {{ optional($banner)->type->name }}
@endsection
@section('keywords')
    {{ optional($banner)->type->name }}
@endsection
@section('content')
    <style>
        .comment-form__input-box input,
        textarea {
            border: 1px var(--insur-primary) solid !important;
        }
    </style>
    <style>
        .js-input-group {
            height: 100%;
            width: 100%;
            padding-bottom: 20px;
            display: flex;
            justify-content: start;
        }

        .js-input-group img {
            height: 100%;
            width: auto;
            border-radius: 10px;
            border: 1px var(--insur-primary) solid !important;
        }
    </style>


    @include('front.sections.banner')
    <!--Page Header End-->

    <!--Contact Page Start-->
    <section class="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="contact-page__left">
                        <div class="section-title text-left">
                            <div class="section-sub-title-box">
                                <p class="section-sub-title"> {{ optional($banner)->type->name }}</p>
                                <div class="section-title-shape-1">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-1.png') }}"
                                        alt="">
                                </div>
                                <div class="section-title-shape-2">
                                    <img src="{{ asset('front/assets/images/shapes/section-title-shape-2.png') }}"
                                        alt="">
                                </div>
                            </div>
                            {{-- <h2 class="section-title__title">{{ $contactText->getName() }}</h2> --}}
                        </div>
                        <div class="mt-3 contact-page__call-email">
                            <div class="contact-page__call-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-page__call-email-content">
                                <h4>
                                    <a href="tel:{{ $contact->phone }}"
                                        class="pt-3 contact-page__call-number">{{ $contact->phone }}</a>

                                </h4>
                            </div>
                        </div>
                        <div class="mt-4 contact-page__call-email">
                            <div class="contact-page__call-icon">
                                <i class="fas fa-mail-bulk"></i>
                            </div>
                            <div class="contact-page__call-email-content">
                                <h4>
                                    <a href="mailto:{{ $contact->email }}"
                                        class=" pt-3 contact-page__email">{{ $contact->email }}</a>
                                </h4>
                            </div>
                        </div>
                        <div class="mt-4 contact-page__call-email">
                            <div class="contact-page__call-icon">
                                <i class="fas fa-map-marker"></i>
                            </div>
                            <div class="contact-page__call-email-content">
                                <h4>
                                    <a href="#" class=" pt-3 contact-page__email">
                                        {!! html_entity_decode($contact->address) !!}
                                    </a>
                                </h4>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="contact-page__right">
                        <div class="contact-page__form">
                            <form action="{{ route('sendMail') }}" method="POST"
                                class="comment-one__form contact-form-validated">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" required placeholder="@lang('transFront.full-name')" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="email" required placeholder="@lang('transFront.email')" name="email">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" required placeholder="@lang('transFront.phone')" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" required placeholder="@lang('transFront.mowzuk')" name="subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box text-message-box">
                                            <textarea name="message" required placeholder="@lang('transFront.message')"></textarea>
                                        </div>

                                        {{-- <div class="row">
                                            <div class="col-lg-6">
                                                <label class="js-input-group" style=""
                                                    for="mathgroup">{!! captcha_img('math') !!}</label>
                                            </div>

                                            <div class="col-lg-6 comment-form__input-box">
                                                <input id="captcha" type="text" class=" "
                                                    placeholder="@lang('transFront.captcha')" name="captcha" required>

                                            </div>
                                        </div> --}}


                                        <div class="comment-form__btn-box mb-3">
                                            <button type="submit"
                                                class="thm-btn comment-form__btn">@lang('transFront.submit')</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--Contact Page End-->


    <section class="google-map-two">

        <iframe
            src="https://yandex.ru/map-widget/v1/?um=constructor%3A9508a7b72469a6bc7b22f0361fe746c70eb3808d255190e56800d70892674c59&amp;source=constructor"
            class="google-map__two" frameborder="0" allowfullscreen></iframe>
    </section>
    <!--Google Map End-->
@endsection
