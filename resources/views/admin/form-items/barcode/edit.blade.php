<div class=" form-group">
    <label for="barcode">
        @lang('transAdmin.barcode')
    </label>
    <div class=" ">
        <input id="barcode" type="text" class="form-control{{ $errors->has('barcode') ? ' is-invalid' : '' }}"
            name="barcode" value="{{ old('barcode', $obj->barcode) }}">
        @if ($errors->has('barcode'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('barcode') }}</strong>
            </span>
        @endif
    </div>
</div>
