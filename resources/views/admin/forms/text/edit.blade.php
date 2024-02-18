@foreach (LaravelLocalization::getSupportedLanguagesKeys() as $locale)
    <div class="form-group">
        <label for="{{ $name }}_{{ $locale }}">{{ $label }} {{ $locale }}</label>
        <input required type="text"
            class='form-control {{ $errors->has($name . '[' . $locale . ']') ? 'is-invalid' : '' }}'
            name="{{ $name }}[{{ $locale }}]"
            value="{{ old($name . '[' . $locale . ']', $translations[$locale] ?? '') }}"
            id="{{ $name }}_{{ $locale }}">
        <div class="invalid-feedback">{{ $errors->first($name . '[' . $locale . ']') }}</div>
    </div>
@endforeach
