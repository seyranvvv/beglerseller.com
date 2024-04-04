<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input required type="number" min="0.01" step="0.01" class='form-control {{ $errors->has($name) ? 'is-invalid' : '' }}'
        name="{{ $name }}" value="{{ old($name, $value) }}" id="{{ $name }}">
    <div class="invalid-feedback">{{ $errors->first($name) }}</div>
</div>
