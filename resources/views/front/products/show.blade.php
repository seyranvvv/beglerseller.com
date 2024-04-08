@extends('front.layouts.app')
@section('title')
    {{ optional($product)->title }} | {{ optional(optional($banner)->type)->name }}
@endsection
@section('keywords')
    {{ optional($product)->title }}, {{ optional(optional($banner)->type)->name }}
@endsection
@section('content')
    <!--Page Header Start-->
    @include('front.sections.banner')

    <!--Insurance Page One Start-->


    <!--Product Details Start-->
    <section class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6">
                    <div class="row">

                        <div class="col-lg-9">
                            <div class="product-details__img js--currentImage cursor-pointer">
                                <img src="{{ $product->getfirstMediaUrl('products') }}" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-3 ">
                            <div class="d-flex flex-lg-column flex-row  justify-content-between h-100">
                                @for ($i = 2; $i < 5; $i++)
                                    @if ($product->getfirstMediaUrl('products_' . $i))
                                        <div class="product-details__img js--singleImage cursor-pointer">
                                            <img src="{{ $product->getfirstMediaUrl('products_' . $i) }}" alt="" />
                                        </div>
                                    @endif
                                @endfor
                            </div>

                        </div>


                    </div>

                </div>
                <div class="col-lg-6 col-xl-6">
                    <div style="display: none" id="product_id" data-product-id="{{ $product->id }}"></div>
                    <div class="product-details__top">
                        <h3 class="product-details__title">{{ $product->title }} </h3>
                    </div>

                    <div class="product-details__content">
                        {!! $product->content !!}
                    </div>
                    <div class="product-details__quantity">
                        <h3 class="product-details__quantity-title">Choose quantity</h3>
                        <div class="quantity-box">
                            <button type="button" class="sub update-cart"><i class="fa fa-minus"></i></button>
                            <input id="product-qty" type="number" id="1" value="{{ $cartQty }}" />
                            <button type="button" class="add update-cart"><i class="fa fa-plus"></i></button>
                        </div>
                        <div
                            class="mx-4 cursor-pointer --js-favorite-icon --js-add-to-favorites @if ($product->isFavorite()) d-none @endif ">
                            <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                            </svg>
                        </div>
                        <div
                            class="mx-4 cursor-pointer --js-favorite-icon --js-remove-from-favorites @if (!$product->isFavorite()) d-none @endif ">
                            <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                            </svg>
                        </div>
                    </div>
                    <div class="product-details-price">
                        <div class="product-price" style="margin: 0;padding:0;">
                            @if ($product->discount_amount > 0)
                                <del style="font-size: 20px;">
                                    <span class="amount">${{ number_format($product->price, 2) }}</span>
                                </del>
                            @endif
                            <ins style="font-size: 32px">
                                <span class="amount">${{ number_format($product->discounted_price, 2) }}</span>
                            </ins>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Product Details End-->

    <!--Product Description Start-->
    <section class="product-description">


    </section>
    <!--Product Description End-->


    <!--Insurance Page One End-->
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.update-cart').on('click', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var product_id = $('#product_id').data('product-id');
                var quantity = $('#product-qty').val();
                if (quantity == '0') {
                    var data = {
                        '_token': $('input[name=_token]').val(),
                        "product_id": product_id,
                    };
                    $.ajax({
                        url: "{{ route('deleteFromCart') }}",
                        type: 'DELETE',
                        data: data,
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                    return;
                }
                $.ajax({
                    url: "{{ route('addtocart') }}",
                    method: "POST",
                    data: {
                        'quantity': quantity,
                        'product_id': product_id,
                    },
                    success: function(response) {
                        cartload();
                    },
                });
            });
            $('.--js-add-to-favorites').on('click', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var product_id = "{{ $product->id }}";
                $.ajax({
                    url: "{{ route('favorites.add', $product->id) }}",
                    method: "POST",
                    data: {
                        'product_id': product_id,
                    },
                    success: function(response) {

                        if (response.success == true) {
                            $('.--js-favorite-icon').toggleClass('d-none');
                        }

                        favoritesload();
                    },
                });
            });
            $('.--js-remove-from-favorites').on('click', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var product_id = "{{ $product->id }}";
                $.ajax({
                    url: "{{ route('favorites.remove', $product->id) }}",
                    method: "POST",
                    data: {
                        'product_id': product_id,
                    },
                    success: function(response) {
                        if (response.success == true) {
                            $('.--js-favorite-icon').toggleClass('d-none');
                        }

                        favoritesload();
                    },
                });
            });
        });
    </script>
@endpush
