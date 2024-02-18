<div class="form-group">
    <label for="address_en"> @lang('transAdmin.address') EN</label>
    <input type="text" class="form-control {{ $errors->has('address_en') ? 'is-invalid' : '' }}" name="address_en"
        value="{{ old('address_en') }}" id="address_en">
    <div class="invalid-feedback">{{ $errors->first('address_en') }}</div>
</div>