<td>
    @foreach (LaravelLocalization::getSupportedLanguagesKeys() as $locale)
        <div class="mb-1">
            {{ $locale }} -
            {!! $obj->getTranslation('title', $locale) !!}
        </div>
    @endforeach
</td>
