<nav class="sidebar">
    <div class="sidebar-header">
        <a href="/" class="sidebar-brand">
            {{ config('section')->name }}</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body folded">
        <ul class="nav">
            <li class="nav-item nav-category">@lang('transAdmin.main')</li>

            <li class="nav-item {{ request()->is('*/section*') ? 'active' : '' }} ">
                <a href="{{ route('admin.sections.edit') }}" class="nav-link">
                    <i class="link-icon" data-feather="star"></i>
                    <span class="link-title">{{ config('section')->name }}</span>
                </a>
            </li>
            {{-- <li class="nav-item ">
                <a href="{{ route('admin.dashboard', ['section' => $otherSection->slug]) }}" class="nav-link">
                    <i class="link-icon" data-feather="refresh-ccw"></i>
                    <span class="link-title">{{ $otherSection->name }}</span>
                </a>
            </li> --}}


            <li class="nav-item nav-category">@lang('transAdmin.image')</li>
            <li class="nav-item {{ request()->is('*/sliders*') ? 'active' : '' }} ">
                <a href="{{ route('admin.sliders.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="image"></i>
                    <span class="link-title">@lang('transAdmin.sliders')</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('*/banners*') ? 'active' : '' }} ">
                <a href="{{ route('admin.banners.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="image"></i>
                    <span class="link-title">@lang('transAdmin.banners')</span>
                </a>
            </li>


            <li class="nav-item {{ request()->is('*/cards*') ? 'active' : '' }} ">
                <a href="{{ route('admin.cards.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="credit-card"></i>
                    <span class="link-title">@lang('transAdmin.icons')</span>
                </a>
            </li>

            <li class="nav-item nav-category">@lang('transAdmin.product')</li>
            <li class="nav-item {{ request()->is('*/parent-categories*') ? 'active' : '' }} ">
                <a href="{{ route('admin.parent-categories.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="grid"></i>
                    <span class="link-title">@lang('transAdmin.main_categories') </span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('*/categories*') ? 'active' : '' }} ">
                <a href="{{ route('admin.categories.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="grid"></i>
                    <span class="link-title">@lang('transAdmin.categories') </span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('*/products*') ? 'active' : '' }} ">
                <a href="{{ route('admin.products.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">@lang('transAdmin.products') </span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('*/requests*') ? 'active' : '' }} ">
                <a href="{{ route('admin.requests.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="inbox"></i>
                    <span class="link-title">@lang('transAdmin.requests') </span>
                </a>
            </li>

            <li class="nav-item nav-category">@lang('transAdmin.information')</li>
            <li class="nav-item {{ request()->is('*/abouts*') ? 'active' : '' }} ">
                <a href="{{ route('admin.abouts.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="info"></i>
                    <span class="link-title">@lang('transAdmin.abuot_us') </span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('*/services*') ? 'active' : '' }} ">
                <a href="{{ route('admin.services.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="tag"></i>
                    <span class="link-title">@lang('transAdmin.services')</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('*/posts*') ? 'active' : '' }} ">
                <a href="{{ route('admin.posts.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="trello"></i>
                    <span class="link-title">@lang('transAdmin.news')</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('*/brands*') ? 'active' : '' }} ">
                <a href="{{ route('admin.brands.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="bold"></i>
                    <span class="link-title">@lang('transAdmin.brands')</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('*/contacts*') ? 'active' : '' }} ">
                <a href="{{ route('admin.contacts.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="phone"></i>
                    <span class="link-title">@lang('transAdmin.contact') </span>
                </a>
            </li>




            <li class="nav-item nav-category">@lang('transAdmin.adminstration')</li>

            <li class="nav-item ">

                <a href="{{ route('admin.password.edit') }}" class="nav-link">
                    <i class="link-icon" data-feather="key"></i>
                    <span class="link-title">@lang('transAdmin.passwrod') </span>
                </a>
            </li>

            <li class="nav-item ">

                <a class="nav-link " href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="link-icon" data-feather="log-out"></i>
                    <span class="link-title">@lang('transAdmin.logout')</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

            <li class="nav-item nav-category">@lang('transAdmin.language')</li>

            <li class="nav-item ">
                <div style="display: flex;gap: 12px;">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            <div>
                                <img width="20" height="15" src="{{ asset("flags/{$localeCode}.png") }}"
                                    alt="">
                                {{-- <span>
                                        {{ $properties['native'] }}
                                    </span> --}}
                            </div>
                        </a>
                    @endforeach
                </div>


                {{-- <a href="{{ route('admin.password.edit') }}" class="nav-link">
                    <i class="link-icon" data-feather="key"></i>
                    <span class="link-title">Acar soz </span>
                </a> --}}
            </li>

        </ul>

    </div>
</nav>
