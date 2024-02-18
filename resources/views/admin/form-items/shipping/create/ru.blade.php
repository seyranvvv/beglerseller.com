<div class="form-group">
    <label for="shipping_ru"> @lang('transAdmin.shipping') RU</label>
    <input type="text" class="form-control {{ $errors->has('shipping_ru') ? 'is-invalid' : '' }}" name="shipping_ru"
        value="{{ old('shipping_ru') }}" id="shipping_ru">
    <div class="invalid-feedback">{{ $errors->first('shipping_ru') }}</div>
</div>