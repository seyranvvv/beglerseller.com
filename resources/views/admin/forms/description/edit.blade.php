@foreach (LaravelLocalization::getSupportedLanguagesKeys() as $locale)
    <div class="form-group">
        <label for="description_{{ $locale }}"> @lang('transAdmin.description') {{ $locale }}</label>
        <textarea required class='form-control {{ $errors->has("description[$locale]") ? 'is-invalid' : '' }}'
            name="description[{{ $locale }}]" id="description_{{ $locale }}" cols="30" rows="10">{{ old("description[$locale]", $obj->getTranslation('description', $locale)) }}
        </textarea>

        <div class="invalid-feedback">{{ $errors->first("description[$locale]") }}</div>
    </div>
@endforeach
