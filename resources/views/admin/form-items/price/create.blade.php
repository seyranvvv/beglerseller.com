<div class=" form-group">
    <label for="price">
        @lang('transAdmin.price') <span class="text-danger">*</span>
    </label>
    <div class=" ">
        <input id="price" type="number" min="1" step="0.1"
            class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price"
            value="{{ old('price') }}" required>
        @if ($errors->has('price'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('price') }}</strong>
            </span>
        @endif
    </div>
</div>
