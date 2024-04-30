<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input required type="password" class='form-control {{ $errors->has($name) ? 'is-invalid' : '' }}'
        name="{{ $name }}" value="{{ old($name) }}" id="{{ $name }}">
    <div class="invalid-feedback">{{ $errors->first($name) }}</div>
</div>
