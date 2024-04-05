@extends('front.layouts.auth')
@section('title')
    @lang('transFront.sign_in')
@endsection
@section('keywords')
    @lang('transFront.sign_in')
@endsection
@section('content')
    <div class="col-12 col-md-6">
        <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
                <div class="col-12">
                    <div class="mb-5">
                        <h3>@lang('transFront.sign_in')</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('front.login') }}" method="POST">
                @csrf
                <div class="row gy-3 gy-md-4 overflow-hidden">
                    @include('front.auth.form-input.email', [
                        'id' => 'email',
                        'name' => 'email',
                        'value' => '',
                        'label' => __('transFront.email'),
                    ])
                    @include('front.auth.form-input.password', [
                        'id' => 'password',
                        'name' => 'password',
                        'value' => '',
                        'label' => __('transFront.password'),
                    ])
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ old("remember") }}" name="remember"
                                id="remember_me">
                            <label class="form-check-label text-secondary" for="remember_me">
                                @lang('transFront.keep_logged_in')
                            </label>
                        </div>
                        <button class="mt-2 btn bsb-btn-xl btn-primary" type="submit">@lang('transFront.sign_in')</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-12">
                    <hr class="mt-5 mb-4 border-secondary-subtle">
                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                        <a href="{{ route('front.register.form') }}"
                            class="link-secondary text-decoration-none">@lang('transFront.sign_up')</a>
                            <a href="#!" class="link-secondary text-decoration-none">Forgot
                                password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
