<td>
    @foreach (LaravelLocalization::getSupportedLanguagesKeys() as $locale)
        <div class="mb-1">
            {{ $locale }} -
            {!! $obj->getTranslation('body', $locale) !!}
        </div>
    @endforeach
</td>
