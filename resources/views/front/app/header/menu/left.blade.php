<style>
    .cart-link {
        position: relative;
    }
    .cart-count {
        position: absolute;
        right: -25px;
        top: 0;
        border-radius: 50%;
        height: 25px;
        width: 25px;
        /* padding: 6px; */
        font-weight: bold;
        font-size: 14px;
        color: rgb(11, 165, 157);
        font-family: 'Roboto-Regular', serif !important;
    }
</style>
<div class="main-menu__left">
    <div class="main-menu__logo d-flex dlex-column justify-content-center" style="position: relative; margin-right: 30px">
        <a href="{!! route('index') !!}">
            <img src="{{ config('section')->getFirstMediaUrl('logos') }}" alt="" style="height: 50px;">
        </a>

    </div>
    <div class="main-menu__main-menu-box">
        <div class="main-header__top-center " id="locales" style="margin-right: 20px">
            <div class="main-header__top-menu-box">
                <ul class="list-unstyled main-header__top-menu">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="main-menu__main-menu-box-inner">
            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
            <ul class="main-menu__list">
                <li class="{{ Route::currentRouteName() == 'index' ? 'current' : '' }}">
                    <a href="{{ route('index') }}">@lang('transFront.home') </a>

                </li>
                <li class="{{ in_array(Route::currentRouteName(), ['about.index']) ? 'current' : '' }}">
                    <a href="{{ route('about.index') }}">@lang('transFront.abouts') </a>

                </li>

                <li
                    class="dropdown {{ in_array(Route::currentRouteName(), ['products.index', 'products.show']) ? 'current ' : '' }}">
                    <a href="#">@lang('transAdmin.products')</a>

                    <ul>
                        @foreach ($parentCategories as $parentCategory)
                            <li>
                                <a
                                    href="{{ route('products.index', ['category' => $parentCategory->categories()->first()->id]) }}">{{ $parentCategory->name }}</a>
                            </li>
                        @endforeach
                    </ul>

                </li>

                <li
                    class="{{ Route::currentRouteName() == 'services.index' || Route::currentRouteName() == 'services.show' ? 'current' : '' }}">
                    <a href="{{ route('services.index') }}">@lang('transFront.services') </a>
                </li>

                <li class="{{ in_array(Route::currentRouteName(), ['posts.index', 'posts.show']) ? 'current ' : '' }}">
                    <a href="{{ route('posts.index') }}">@lang('transAdmin.posts')</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'contact.index' ? 'current ' : '' }}">
                    <a href="{{ route('contact.index') }}">@lang('transFront.contact')</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'cart' ? 'current ' : '' }}">
                    {{-- <a class="cart-link" href="{{ route('cart') }}">@lang('transFront.cart')
                        <div class="cart-count"></div>
                    </a> --}}
                    {{-- <a href="cart.html" class="main-menu__cart insur-two-icon-shopping-cart"></a> --}}
                    <div class="">
                        <div class="">
                            {{-- <a href="#" class="main-menu__search search-toggler icon-magnifying-glass"></a> --}}
                            <a href="{{ route('cart') }}" class="main-menu__cart insur-two-icon-shopping-cart">
                                <div class="cart-count"></div>
                            </a>
                        </div>
                        {{-- <div class="main-menu__main-menu-box-get-quote-btn-box">
                            <a href="contact.html" class="thm-btn main-menu__main-menu-box-get-quote-btn">Get a Quote</a>
                        </div> --}}
                    </div>
                </li>
            </ul>
        </div>
        <div class="main-menu__main-menu-box-search-get-quote-btn">

            <ul class="pagination " style="padding-right: 8px; height: 100% ">

            </ul>
        </div>
    </div>
</div>
