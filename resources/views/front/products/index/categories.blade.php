<div class="col-xl-3 col-lg-3">
    <div class="product__sidebar">


        <div class="shop-category product__sidebar-single">
            <h3 class="product__sidebar-title"> @lang('transAdmin.categories')</h3>
            <ul class="list-unstyled">
                @foreach ($categories as $category)
                    <li class="{{ request('category') == $category->id ? 'active' : '' }}">
                        <a href="{{ route('products.index', ['category' => $category->id]) }}">{{ $category->name }}</a>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
