@extends('front.layouts.app')
@section('title')
    {{ optional($banner)->type->name }}
@endsection
@section('keywords')
    {{ optional($banner)->type->name }}
@endsection
@section('content')
    <style>
        * {
            text-indent: unset !important;
        }
    </style>

    <!--Page Header Start-->
    @include('front.sections.banner')






    @include('front.sections.about')


    @include('front.sections.counter')
    <!--Counter One End-->
@endsection
