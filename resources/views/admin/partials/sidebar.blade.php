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
            <li class="nav-item nav-category">Esasy</li>

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


            <li class="nav-item nav-category">Surat</li>
            <li class="nav-item {{ request()->is('*/sliders*') ? 'active' : '' }} ">
                <a href="{{ route('admin.sliders.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="image"></i>
                    <span class="link-title">Sliderlar</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('*/banners*') ? 'active' : '' }} ">
                <a href="{{ route('admin.banners.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="image"></i>
                    <span class="link-title">Bannerler</span>
                </a>
            </li>


            <li class="nav-item {{ request()->is('*/cards*') ? 'active' : '' }} ">
                <a href="{{ route('admin.cards.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="credit-card"></i>
                    <span class="link-title">Kartoçkalar</span>
                </a>
            </li>

            <li class="nav-item nav-category">Haryt</li>
            <li class="nav-item {{ request()->is('*/parent-categories*') ? 'active' : '' }} ">
                <a href="{{ route('admin.parent-categories.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="grid"></i>
                    <span class="link-title">Baş kategoriýalar </span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('*/categories*') ? 'active' : '' }} ">
                <a href="{{ route('admin.categories.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="grid"></i>
                    <span class="link-title">Kategoriýalar </span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('*/products*') ? 'active' : '' }} ">
                <a href="{{ route('admin.products.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Harytlar </span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('*/requests*') ? 'active' : '' }} ">
                <a href="{{ route('admin.requests.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="inbox"></i>
                    <span class="link-title">Requests </span>
                </a>
            </li>

            <li class="nav-item nav-category">Maglumat</li>
            <li class="nav-item {{ request()->is('*/abouts*') ? 'active' : '' }} ">
                <a href="{{ route('admin.abouts.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="info"></i>
                    <span class="link-title">Biz barada </span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('*/services*') ? 'active' : '' }} ">
                <a href="{{ route('admin.services.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="tag"></i>
                    <span class="link-title">Hyzmatlar</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('*/posts*') ? 'active' : '' }} ">
                <a href="{{ route('admin.posts.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="trello"></i>
                    <span class="link-title">Täzelikler</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('*/brands*') ? 'active' : '' }} ">
                <a href="{{ route('admin.brands.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="bold"></i>
                    <span class="link-title">Brendler</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('*/contacts*') ? 'active' : '' }} ">
                <a href="{{ route('admin.contacts.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="phone"></i>
                    <span class="link-title">Habarlaşmak </span>
                </a>
            </li>




            <li class="nav-item nav-category">Çykmak</li>

            <li class="nav-item ">

                <a class="nav-link " href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="link-icon" data-feather="log-out"></i>
                    <span class="link-title">Çykmak</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>

    </div>
</nav>
