@extends('front.layouts.app')
@section('title')
    {{ optional($banner)->type->name }}
@endsection
@section('keywords')
    {{ optional($banner)->type->name }}
@endsection
@section('content')
    <!--Page Header Start-->
    @include('front.categories.banner')

    <!--Insurance Page One Start-->
    <section class="insurance-page-one">
        <div class="services-one__container">
            <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-2">
                <!--Services One Single Start-->
                @foreach ($categories as $category)
                        <!--Services One Single Start-->
                        <div class="col wow fadeInUp" data-wow-delay="100ms">
                            <div class="services-one__single ">
                                <a class="d-block " href="{{ route('products.index', ['category' => $category->id]) }}">
                                    <div class="service-one__img rounded-0">

                                        <img class="p-3" src="{{ $category->getFirstMediaUrl('categories') }}"
                                            alt="">
                                    </div>
                                    <div class="service-one__content bg-dark py-3 rounded-0 ">

                                        <h2 class="service-one__title line-clamp-2 link-light text-center ">
                                            {{ $category->name }}
                                        </h2>
                                    </div>
                                </a>

                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </section>
    <!--Insurance Page One End-->
@endsection
