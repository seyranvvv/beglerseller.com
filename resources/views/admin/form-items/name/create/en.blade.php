<div class="form-group">
    <label for="name_en"> @lang('transAdmin.name') EN</label>
    <input type="text" class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}" name="name_en"
        value="{{ old('name_en') }}" id="name_en">
    <div class="invalid-feedback">{{ $errors->first('name_en') }}</div>
</div>
