<td>
    @foreach (LaravelLocalization::getSupportedLanguagesKeys() as $locale)
        <div class="mb-1">
            {{ $locale }} -
            {!! $obj->getTranslation('address', $locale) !!}
        </div>
    @endforeach
</td>
