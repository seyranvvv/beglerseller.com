<div class="main-menu-three__right">
    <div class="main-menu-three__search-get-quote-btn">
        <div class="main-menu-three__get-quote-btn-box">
            <a href="{{ route('index', ['section' => $otherSection->slug]) }}"
                class="thm-btn main-menu-three__get-quote-btn">
                {{ optional($otherSection)->name }}
            </a>
        </div>
    </div>
</div>
