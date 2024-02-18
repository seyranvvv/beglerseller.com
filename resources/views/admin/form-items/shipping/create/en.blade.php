<div class="form-group">
    <label for="shipping_en"> @lang('transAdmin.shipping') EN</label>
    <input type="text" class="form-control {{ $errors->has('shipping_en') ? 'is-invalid' : '' }}" name="shipping_en"
        value="{{ old('shipping_en') }}" id="shipping_en">
    <div class="invalid-feedback">{{ $errors->first('shipping_en') }}</div>
</div>