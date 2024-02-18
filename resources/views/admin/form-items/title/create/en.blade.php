<div class="form-group">
    <label for="title_en"> @lang('transAdmin.title') EN</label>
    <input type="text" class="form-control {{ $errors->has('title_en') ? 'is-invalid' : '' }}" name="title_en"
        value="{{ old('title_en') }}" id="title_en">
    <div class="invalid-feedback">{{ $errors->first('title_en') }}</div>
</div>
