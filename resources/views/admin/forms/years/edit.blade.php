@foreach (LaravelLocalization::getSupportedLanguagesKeys() as $locale)
    <div class="form-group">
        <label for="years_text_{{ $locale }}"> @lang('transAdmin.years_text') {{ $locale }}</label>
        <input required type="text" class='form-control {{ $errors->has("years_text[$locale]") ? 'is-invalid' : '' }}'
            name="years_text[{{ $locale }}]"
            value="{{ old("years_text[$locale]", $obj->getTranslation('years_text', $locale)) }}"
            id="years_text_{{ $locale }}">
        <div class="invalid-feedback">{{ $errors->first("years_text[$locale]") }}</div>
    </div>
@endforeach
<div class="form-group">
    <label for="years_number"> @lang('transAdmin.years_number') </label>
    <input required type="number" class='form-control {{ $errors->has('years_number') ? 'is-invalid' : '' }}'
        name="years_number" value="{{ old('years_number', $obj->years_number) }}" id="years_number">
    <div class="invalid-feedback">{{ $errors->first('years_number') }}</div>
</div>
