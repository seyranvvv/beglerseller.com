@extends('front.layouts.app')
@section('title')
    {{ trans('transFront.cart') }}
@endsection
@section('keywords')
    {{ trans('transFront.cart') }}
@endsection
@section('content')
    <!--Page Header Start-->
    @include('front.sections.banner')

    <!--Insurance Page One Start-->


    <!--Start Cart Page-->
    @if (isset($cart_data) && $cart_data && Cookie::get('shopping_cart'))
        @php $total="0" @endphp
        <section class="cart-page">
            <div class="container">
                <div class="table-responsive">
                    <table class="table cart-table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart_data as $data)
                                <tr class="cartpage" data-product-id="{{ $data['item_id'] }}">
                                    <td>
                                        <div class="product-box">
                                            <div class="img-box">
                                                <img src="{{ $data['item_image'] }}" alt="">
                                            </div>
                                            <h3><a href="product-details.html">{{ $data['item_name'] }}</a></h3>
                                        </div>
                                    </td>
                                    <td>${{ number_format($data['item_price'], 2) }}</td>
                                    <td>
                                        <div class="quantity-box">
                                            <button type="button" class="sub changeQuantity" data-min="1"><i
                                                    class="fa fa-minus"></i></button>
                                            <input type="number" id="product-1" class="qty-input"
                                                value="{{ $data['item_quantity'] }}" />
                                            <button type="button" class="add changeQuantity"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td>
                                        ${{ number_format($data['item_quantity'] * $data['item_price'], 2) }}
                                    </td>
                                    <td>
                                        <div class="cross-icon delete_cart_data">
                                            <i class="fa fa-times remove-icon delete_cart_data"></i>
                                        </div>
                                    </td>
                                </tr>

                                @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="row">
                    <div class="col-xl-8 col-lg-7">

                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <ul class="cart-total list-unstyled">
                            <li>
                                <span>Total</span>
                                <span class="cart-total-amount">${{ $total }} USD</span>
                            </li>
                        </ul>
                        <div class="cart-page__buttons">
                            <div class="cart-page__buttons-1">
                                <a href="{{ route('products.index') }}" class="thm-btn">Continue Shopping</a>
                            </div>
                            <div class="cart-page__buttons-2">
                                <a href="{{ route('cart.checkout')}}" class="thm-btn">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="row">
            <div class="col-md-12 mycard py-5 text-center">
                <div class="mycards">
                    <h4>Your cart is currently empty.</h4>
                    <a href="{{ route('products.index') }}" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue
                        Shopping</a>
                </div>
            </div>
        </div>
    @endif
    <!--End Cart Page-->



    <!--Insurance Page One End-->
@endsection

@push('js')
    <script>
        $(document).ready(function() {

            $('.changeQuantity').click(function(e) {
                e.preventDefault();
                var quantity = $(this).closest(".cartpage").find('.qty-input').val();
                var product_id = $(this).closest(".cartpage").data('product-id');
                if (quantity == '0'){
                    return ;
                }

                var data = {
                    '_token': $('input[name=_token]').val(),
                    'quantity': quantity,
                    'product_id': product_id,
                };

                $.ajax({
                    url: "{{ route('updateToCart') }}",
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        window.location.reload();
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(response.status);
                    }
                });
            });

        });

        $(document).ready(function() {

            $('.delete_cart_data').click(function(e) {
                e.preventDefault();

                var product_id = $(this).closest(".cartpage").data('product-id');

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
            });

        });
    </script>
@endpush
