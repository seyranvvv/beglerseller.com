<div class="d-flex flex-row">
    <div class="dropdown">
        <button class="btn p-0" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather icon-lg text-muted pb-3px  feather-more-horizontal">
                <circle cx="12" cy="12" r="1"></circle>
                <circle cx="19" cy="12" r="1"></circle>
                <circle cx="5" cy="12" r="1"></circle>
            </svg>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
            {{-- edit section --}}

            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.discount-days.show', $r->id) }}">
                <i data-feather="grid" class=" icon-sm mr-2"></i>
                <span class="">Giňişleýin
                </span>
            </a>
            <a href="{{ route('admin.discount-days.edit', $r->id) }}" class="dropdown-item d-flex align-items-center">
                <i data-feather="edit" class=" icon-sm mr-2"></i>
                <span class="">Üýtgetmek</span>
            </a>
        </div>
    </div>
</div>
