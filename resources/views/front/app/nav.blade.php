<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
        <div class="logo-box">
            <a href="{!! route('index') !!}"><img src="{{ config('section')->getFirstMediaUrl('logos') }}"" alt=""
                    style="width: 143px"></a>

        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:{{ optional($contact)->email }}">{{ optional($contact)->email }}</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:{{ optional($contact)->phone }}">{{ optional($contact)->phone }}</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->



    </div>
    <!-- /.mobile-nav__content -->
</div>
