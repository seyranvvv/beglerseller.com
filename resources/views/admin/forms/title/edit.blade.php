@foreach (LaravelLocalization::getSupportedLanguagesKeys() as $locale)
    <div class="form-group">
        <label for="title_{{ $locale }}"> @lang('transAdmin.title') {{ $locale }}</label>
        <input required type="text" class='form-control {{ $errors->has("title[$locale]") ? 'is-invalid' : '' }}'
            name="title[{{ $locale }}]" value="{{ old("title[$locale]", $obj->getTranslation('title', $locale)) }}"
            id="title_{{ $locale }}">
        <div class="invalid-feedback">{{ $errors->first("title[$locale]") }}</div>
    </div>
@endforeach
