@foreach (LaravelLocalization::getSupportedLanguagesKeys() as $locale)
    <div class="form-group">
        <label for="content_{{ $locale }}"> @lang('transAdmin.body') {{ $locale }}</label>
        <textarea required class='form-control tinymce {{ $errors->has("content[$locale]") ? 'is-invalid' : '' }}'
            name="content[{{ $locale }}]" id="content_{{ $locale }}" cols="30" rows="10">{{ old("content[$locale]", $obj->getTranslation('content', $locale)) }}
        </textarea>

        <div class="invalid-feedback">{{ $errors->first("content[$locale]") }}</div>
    </div>
@endforeach
