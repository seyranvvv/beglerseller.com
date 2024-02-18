<div class="form-group">
    <label for="info_ru"> @lang('transAdmin.info') RU</label>
    <input type="text" class="form-control {{ $errors->has('info_ru') ? 'is-invalid' : '' }}" name="info_ru"
        value="{{ old('info_ru') }}" id="info_ru">
    <div class="invalid-feedback">{{ $errors->first('info_ru') }}</div>
</div>