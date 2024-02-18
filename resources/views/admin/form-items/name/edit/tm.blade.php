<div class="form-group">
    <label for="name_tm"> @lang('transAdmin.name') TM</label>
    <input type="text" class="form-control {{ $errors->has('name_tm') ? 'is-invalid' : '' }}" name="name_tm"
        value="{{ old('name_tm', $obj->name_tm) }}" id="name_tm">
    <div class="invalid-feedback">{{ $errors->first('name_tm') }}</div>
</div>
