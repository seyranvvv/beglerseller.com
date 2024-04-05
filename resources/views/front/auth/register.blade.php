@extends('front.layouts.auth')
@section('title')
    @lang('transFront.register')
@endsection
@section('keywords')
    @lang('transFront.register')
@endsection
@section('content')
    <div class="col-12 col-md-6">
        <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
                <div class="col-12">
                    <div class="mb-5">
                        <h3>Sign up</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('front.register') }}" method="POST">
                @csrf
                <div class="row gy-3 gy-md-4 overflow-hidden">
                    <div class="col-6">
                        <div class="row">
                            @include('front.auth.form-input.name', [
                                'id' => 'first-name',
                                'name' => 'first_name',
                                'value' => '',
                                'label' => __('transFront.first_name'),
                            ])
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            @include('front.auth.form-input.name', [
                                'id' => 'last-name',
                                'name' => 'last_name',
                                'value' => '',
                                'label' => __('transFront.last_name'),
                            ])
                        </div>
                    </div>


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
                    @include('front.auth.form-input.password', [
                        'id' => 'password_confirmation',
                        'name' => 'password_confirmation',
                        'value' => '',
                        'label' => __('transFront.password_confirmation'),
                    ])
                    <div class="col-12">
                        <button class="mt-2 btn bsb-btn-xl btn-primary" type="submit">Sign Up</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-12">
                    <hr class="mt-5 mb-4 border-secondary-subtle">
                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                        <a href="{{ route('front.login.form') }}" class="link-secondary text-decoration-none">Log in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
