<div class="form-group">
    <label for="info_tm"> @lang('transAdmin.info') TM</label>
    <input type="text" class="form-control {{ $errors->has('info_tm') ? 'is-invalid' : '' }}" name="info_tm"
        value="{{ old('info_tm') }}" id="info_tm">
    <div class="invalid-feedback">{{ $errors->first('info_tm') }}</div>
</div>