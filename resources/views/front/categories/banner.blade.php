<section class="page-header mb-5">
    <div class="page-header-bg" style="background-image: url({{ optional($banner)->getFirstMediaUrl('banners') }})">
    </div>
    <div class="page-header-shape-1"></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('index') }}">@lang('transFront.home')</a></li>
                <li><span>/</span></li>
                <li> @lang('transFront.categories')
                </li>
            </ul>
            <h2> @lang('transFront.categories')
            </h2>
        </div>
    </div>
</section>
