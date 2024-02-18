<div class="form-group">
    <label for="address_tm"> @lang('transAdmin.address') TM</label>
    <input type="text" class="form-control {{ $errors->has('address_tm') ? 'is-invalid' : '' }}" name="address_tm"
        value="{{ old('address_tm') }}" id="address_tm">
    <div class="invalid-feedback">{{ $errors->first('address_tm') }}</div>
</div>