<div class="form-group">
    <label for="phone"> @lang('transAdmin.phone')</label>
    <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone"
        value="{{ old('phone') }}" id="phone">
    <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
</div>
