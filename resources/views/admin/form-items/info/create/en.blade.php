<div class="form-group">
    <label for="info_en"> @lang('transAdmin.info') EN</label>
    <input type="text" class="form-control {{ $errors->has('info_en') ? 'is-invalid' : '' }}" name="info_en"
        value="{{ old('info_en') }}" id="info_en">
    <div class="invalid-feedback">{{ $errors->first('info_en') }}</div>
</div>
