@extends('front.layouts.app')
@section('title')
    @lang('transFront.home')
@endsection

@section('keywords')
    @lang('transFront.home')
@endsection
@section('content')
    @include('front.sections.slider')
    @include('front.sections.features')
    @include('front.sections.about')
    @include('front.sections.counter')
    @include('front.sections.services')
    @include('front.sections.news')
    @include('front.sections.categories')
@endsection
