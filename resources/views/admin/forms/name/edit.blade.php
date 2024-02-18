@foreach (LaravelLocalization::getSupportedLanguagesKeys() as $locale)
    <div class="form-group">
        <label for="name_{{ $locale }}"> @lang('transAdmin.name') {{ $locale }}</label>
        <input required type="text" class='form-control {{ $errors->has("name[$locale]") ? 'is-invalid' : '' }}'
            name="name[{{ $locale }}]" value="{{ old("name[$locale]", $obj->getTranslation('name', $locale)) }}"
            id="name_{{ $locale }}">
        <div class="invalid-feedback">{{ $errors->first("name[$locale]") }}</div>
    </div>
@endforeach
