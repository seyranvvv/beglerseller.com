<div class="product__all">
    <div class="row">
        @foreach ($products as $product)
            <!--Product All Single Start-->
            <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                <div class="product__all-single">
                    <a href="{{ route('products.show', $product->id) }}">

                        <div class="product__all-img">

                            <img src="{{ $product->getFirstMediaUrl('products') }}" alt="">

                        </div>
                    </a>
                    <div class="product__all-content">
                        <a href="{{ route('products.show', $product->id) }}">
                            <h4 class="product__all-title">
                                {{ $product->title }}
                            </h4>

                        </a>

                    </div>
                </div>
            </div>
            <!--Product All Single End-->
        @endforeach




    </div>
</div>
