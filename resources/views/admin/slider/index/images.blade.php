<td>
    @foreach (LaravelLocalization::getSupportedLanguagesKeys() as $locale)
        @if ($obj->getFirstMediaUrl('slider_' . $locale))
            <img src="{{ $obj->getFirstMediaUrl('slider_' . $locale) }}" alt="{{ $obj->title }}"
                class="img-fluid img-max border">
        @else
            <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')" class="img-fluid img-max border">
        @endif
        <hr class="my-1">
    @endforeach
</td>
