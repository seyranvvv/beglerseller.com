<div class="form-group">
    <label for="name_ru"> @lang('transAdmin.name') RU</label>
    <input type="text" class="form-control {{ $errors->has('name_ru') ? 'is-invalid' : '' }}" name="name_ru"
        value="{{ old('name_ru') }}" id="name_ru">
    <div class="invalid-feedback">{{ $errors->first('name_ru') }}</div>
</div>
