<div class="main-header__top">
    <div class="container">
        <div class="main-header__top-inner">
            <div class="main-header__top-address">
                <ul class="list-unstyled main-header__top-address-list">
                    <li>
                        <i class="icon">
                            <span class="icon-pin"></span>
                        </i>
                        <div class="text">
                            <p>{!! html_entity_decode(optional($contact)->address) !!}</p>
                        </div>
                    </li>
                    <li>
                        <i class="icon">
                            <span class="icon-email"></span>
                        </i>
                        <div class="text">
                            <p><a href="mailto:{{ optional($contact)->email }}">{{ optional($contact)->email }}</a>
                            </p>
                        </div>
                    </li>
                    <li>
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="#015fc9" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-phone">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                </path>
                            </svg>
                        </i>
                        <div class="text">
                            <p><a href="tel:{{ optional($contact)->phone }}">{{ optional($contact)->phone }}</a></p>
                        </div>
                    </li>
                    {{-- <li>
                        <i class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="#015fc9" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-printer">
                                <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2">
                                </path>
                                <rect x="6" y="14" width="12" height="8"></rect>
                            </svg>
                        </i>
                        <div class="text">
                            <p><a href="tel:{{ optional($contact)->fax }}">{{ optional($contact)->fax }}</a></p>
                        </div>
                    </li> --}}
                </ul>
            </div>
            <div class="main-header__top-right">
                <div class="main-header__top-menu-box">
                    <ul class="list-unstyled main-header__top-menu">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <div>
                                        <img width="20" height="15" src="{{asset("flags/{$localeCode}.png")}}" alt="">
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
        </div>
    </div>
</div>
