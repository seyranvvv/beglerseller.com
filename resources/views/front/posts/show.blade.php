@extends('front.layouts.app')
@section('title')
    {{ $post->title }}
@endsection
@section('keywords')
    {{ optional($banner)->type->name }}
@endsection
@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{ optional($banner)->getFirstMediaUrl('banners') }})">
        </div>
        <div class="page-header-shape-1"></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('index') }}">@lang('transFront.home')</a></li>
                    <li><span>/</span></li>
                    <li>{{ optional($banner)->type->name }}</li>
                </ul>
                <h2>{{ $post->name }} </h2>
            </div>
        </div>
    </section>


    <!--News Details Start-->
    <section class="news-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="news-details__left">
                        <div class="news-details__img">
                            <img src="{{ $post->getFirstMediaUrl('posts') }}" alt="">
                        </div>
                        <div class="news-details__content">
                            <ul class="list-unstyled news-details__meta">
                                <li><a href="#"><i class="far fa-calendar"></i> {!! $post->publishedAt() !!} </a>
                                </li>

                            </ul>
                            <h3 class="news-details__title">{!! $post->title !!}</h3>
                            {!! html_entity_decode($post->content) !!}
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        {{-- <div class="sidebar__single sidebar__search">
                            <form action="#" class="sidebar__search-form">
                                <input type="search" placeholder="@lang('transFront.search')">
                                <button type="submit"><i class="icon-magnifying-glass"></i></button>
                            </form>
                        </div> --}}
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">@lang('transFront.latest_post')</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                @foreach ($posts as $post)
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="{{ $post->getFirstMediaUrl('posts') }}" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <span class="sidebar__post-content-meta"><i class="far fa-user-circle"></i>
                                                    @lang('transFront.by_admin')</span>
                                                <a href="{!! route('posts.show', $post) !!}">{!! $post->title !!}</a>
                                            </h3>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--News Details End-->
@endsection
