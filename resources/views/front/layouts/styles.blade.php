<style>
    :root {
        --insur-black: {{ config('section')->secondary_color }};
    }

    :root {
        --insur-base: {{ config('section')->base_color }};
    }

    :root {
        --insur-primary: {{ config('section')->primary_color }};
    }

    :root {
        --zero-base-primary-moz: -moz-linear-gradient(0deg, #015fc9 0, #0ce0ff 100%);
    }

    :root {
        --zero-base-primary-webkit: -webkit-linear-gradient(0deg, #015fc9 0, #0ce0ff 100%);
    }

    :root {
        --zero-base-primary-ms: -ms-linear-gradient(0deg, #015fc9 0, #0ce0ff 100%);
    }


    .get-insurance__progress .bar-inner,
    .main-slider__title:before,
    .service-one__title:before {
        background-image: -moz-linear-gradient(0deg, {{ config('section')->base_color }} 0, {{ config('section')->primary_color }} 100%);
        background-image: -webkit-linear-gradient(0deg, {{ config('section')->base_color }} 0, {{ config('section')->primary_color }} 100%);
        background-image: -ms-linear-gradient(0deg, {{ config('section')->base_color }} 0, {{ config('section')->primary_color }} 100%);
    }

    .feature-one__icon {
        background-image: -moz-linear-gradient(90deg, {{ config('section')->base_color }} 0, {{ config('section')->primary_color }} 100%);
        background-image: -webkit-linear-gradient(90deg, {{ config('section')->base_color }} 0, {{ config('section')->primary_color }} 100%);
        background-image: -ms-linear-gradient(90deg, {{ config('section')->base_color }} 0, {{ config('section')->primary_color }} 100%);

    }

    .feature-one__single:hover .feature-one__icon {
        background-image: -moz-linear-gradient(0deg, {{ config('section')->primary_color }} 0, {{ config('section')->base_color }} 100%);
        background-image: -webkit-linear-gradient(0deg, {{ config('section')->primary_color }} 0, {{ config('section')->base_color }} 100%);
        background-image: -ms-linear-gradient(0deg, {{ config('section')->primary_color }} 0, {{ config('section')->base_color }} 100%);

    }








    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    a {
        font-family: 'Roboto-Regular', serif !important;
    }

    * {
        text-indent: unset !important;
    }

    .counter-one__plus {
        padding-left: 4px !important;
    }

    .odometer.odometer-auto-theme .odometer-digit .odometer-digit-inner,
    .odometer.odometer-theme-default .odometer-digit .odometer-digit-inner {
        overflow: visible !important;
    }

    .lang-active {
        color: var(--insur-primary) !important;
    }

    .about-one__right ul,
    .about-four__right ul {
        list-style: none;
        padding-left: 0;

    }

    .about-one__right li,
    .about-four__right li {
        display: flex;
        flex-direction: row-reverse;
        justify-content: start;

    }

    .about-one__right .icon,
    .about-four__right .icon {
        height: 16px;
        width: 16px;
        background-color: var(--insur-primary);
        font-size: 10px;
        color: var(--insur-white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        flex-direction: column;
        margin-top: 4px;
    }

    @media only screen and (min-width: 991px) {
        #locales {
            display: none;
        }
    }


    .main-header__top-address-list svg {
        stroke: var(--insur-base)
    }
</style>
