<div class="form-group">
    <label for="slug"> @lang('transAdmin.url') </label>
    <input required type="text" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" name="slug"
        value="{{ old('slug', $obj->slug) }}" id="slug">
    <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
</div>
