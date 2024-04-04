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
                    </div>


                    {{-- <div class="product-details__buttons">
                        <div class="product-details__buttons-1">
                            <a href="#" class="thm-btn add-to-cart-btn">Add to
                                Cart</a>
                        </div>
                    </div> --}}
                    {{-- <div class="about-one__btn-box mt-4">

                        <button type="button" data-bs-toggle="modal" data-bs-target="#requestModal"
                            class="thm-btn about-one__btn border-0">@lang('transFront.order')</button>
                    </div> --}}
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
        });
    </script>
@endpush
