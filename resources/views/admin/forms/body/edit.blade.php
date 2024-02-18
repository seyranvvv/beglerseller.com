@foreach (LaravelLocalization::getSupportedLanguagesKeys() as $locale)
    <div class="form-group">
        <label for="body_{{ $locale }}"> @lang('transAdmin.body') {{ $locale }}</label>
        <textarea required class='form-control {{ $errors->has("body[$locale]") ? 'is-invalid' : '' }}' name="body[{{ $locale }}]"
            id="body_{{ $locale }}" cols="30" rows="10">{{ old("body[$locale]", $obj->getTranslation('body', $locale)) }}
        </textarea>

        <div class="invalid-feedback">{{ $errors->first("body[$locale]") }}</div>
    </div>
@endforeach
