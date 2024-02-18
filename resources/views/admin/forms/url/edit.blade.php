<div class=" form-group">
    <label for="url">
        @lang('transAdmin.url') <span class="text-danger">*</span>
    </label>
    <div class=" ">
        <input required id="url" type="text" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}"
            name="url" value="{{ old('url', $obj->url) }}" required>
        @if ($errors->has('url'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('url') }}</strong>
            </span>
        @endif
    </div>
</div>
