<style>
    .cart-link {
        position: relative;
    }

    .top-count {
        position: absolute;
        right: -11px;
        top: -5px;
        border-radius: 50%;
        height: 15px;
        width: 15px;
        vertical-align: middle;
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--insur-primary);
        font-weight: bold;
        font-size: 10px;
        line-height: 10px;
        color: var(--insur-white);
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
                                <div>
                                    <img width="20" height="15" src="{{ asset("flags/{$localeCode}.png") }}"
                                        alt="">
                                    <span>
                                        {{ $properties['native'] }}
                                    </span>
                                </div>
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
                <li class="{{ in_array(Route::currentRouteName(), ['categories.index']) ? 'current' : '' }}">
                    <a href="{{ route('categories.index') }}">@lang('transFront.categories') </a>

                </li>
                <li class="{{ in_array(Route::currentRouteName(), ['brands.index']) ? 'current' : '' }}">
                    <a href="{{ route('brands.index') }}">@lang('transAdmin.brands') </a>

                </li>
                {{-- <li class="{{ in_array(Route::currentRouteName(), ['about.index']) ? 'current' : '' }}">
                    <a href="{{ route('about.index') }}">@lang('transFront.abouts') </a>

                </li> --}}


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

                {{-- <li
                    class="{{ Route::currentRouteName() == 'services.index' || Route::currentRouteName() == 'services.show' ? 'current' : '' }}">
                    <a href="{{ route('services.index') }}">@lang('transFront.services') </a>
                </li> --}}

                <li class="{{ in_array(Route::currentRouteName(), ['posts.index', 'posts.show']) ? 'current ' : '' }}">
                    <a href="{{ route('posts.index') }}">@lang('transAdmin.posts')</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'contact.index' ? 'current ' : '' }}">
                    <a href="{{ route('contact.index') }}">@lang('transFront.contact')</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'cart' ? 'current ' : '' }} cart-link">
                    {{-- <div class="">
                        <div class="cart-link">
                            <a href="{{ route('cart') }}" class="main-menu__cart insur-two-icon-shopping-cart ">
                                <div class="cart-count"></div>
                            </a>
                        </div>
                    </div> --}}
                    <a href="{{ route('cart') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-shopping-cart">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <div class="top-count cart-count"></div>
                    </a>
                </li>
                <li class="{{ in_array(Route::currentRouteName(), ['favorites.index']) ? 'current' : '' }} cart-link">
                    <a href="{{ route('favorites.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-heart">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                            </path>
                        </svg>
                        <div class="top-count favorite-count"></div>
                    </a>

                </li>
                @auth('client')
                    <li class="{{ in_array(Route::currentRouteName(), ['front.logout']) ? 'current' : '' }}">
                        <a href="{{ route('front.logout') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-log-out">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                <polyline points="16 17 21 12 16 7" />
                                <line x1="21" y1="12" x2="9" y2="12" />
                            </svg>
                        </a>
                    </li>
                @endauth
                @guest('client')
                    <li class="{{ in_array(Route::currentRouteName(), ['brands.index']) ? 'current' : '' }}">
                        <a href="{{ route('front.login') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </a>
                    </li>
                @endguest

            </ul>
        </div>
        <div class="main-menu__main-menu-box-search-get-quote-btn">

            <ul class="pagination " style="padding-right: 8px; height: 100% ">

            </ul>
        </div>
    </div>
</div>
