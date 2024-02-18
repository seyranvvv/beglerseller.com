<div class="form-group">
    <label for="title_ru"> @lang('transAdmin.title') RU</label>
    <input type="text" class="form-control {{ $errors->has('title_ru') ? 'is-invalid' : '' }}" name="title_ru"
        value="{{ old('title_ru',  $obj->title_ru) }}" id="title_ru">
    <div class="invalid-feedback">{{ $errors->first('title_ru') }}</div>
</div>
