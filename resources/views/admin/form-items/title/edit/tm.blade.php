<div class="form-group">
    <label for="title_tm"> @lang('transAdmin.title') TM</label>
    <input type="text" class="form-control {{ $errors->has('title_tm') ? 'is-invalid' : '' }}" name="title_tm"
        value="{{ old('title_tm', $obj->title_tm) }}" id="name_tm">
    <div class="invalid-feedback">{{ $errors->first('title_tm') }}</div>
</div>
