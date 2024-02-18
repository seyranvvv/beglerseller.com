<section class="page-header mb-5">
    <div class="page-header-bg" style="background-image: url({{ optional($banner)->getFirstMediaUrl('banners') }})">
    </div>
    <div class="page-header-shape-1"></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('index') }}">@lang('transFront.home')</a></li>
                <li><span>/</span></li>
                <li> {{ optional(optional($banner)->type)->name }}
                </li>
            </ul>
            <h2> {{ optional(optional($banner)->type)->name }}
            </h2>
        </div>
    </div>
</section>
