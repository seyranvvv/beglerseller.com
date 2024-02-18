<div class="form-group">
    <label for="address_ru"> @lang('transAdmin.address') RU</label>
    <input type="text" class="form-control {{ $errors->has('address_ru') ? 'is-invalid' : '' }}" name="address_ru"
        value="{{ old('address_ru') }}" id="address_ru">
    <div class="invalid-feedback">{{ $errors->first('address_ru') }}</div>
</div>