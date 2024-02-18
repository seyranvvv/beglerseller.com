@extends('front.layouts.app')
@section('title')
{{  optional($banner)->type->name  }}
@endsection
@section('keywords')
{{  optional($banner)->type->name  }}
@endsection
@section('content')
    <!--Page Header Start-->
    @include('front.sections.banner')



    <!--News One Start-->
    <section class="news-one">
        <div class="container">
            <div class="row">
                <!--News One Single Start-->
                    @include('front.sections.news')
            </div>
        </div>
    </section>
    <!--News One End-->
@endsection
