<div class="form-group">
    <label for="phone"> @lang('transAdmin.phone') </label>
    <input type="text" class='form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}' name="phone"
        value="{{ old('phone', $obj->phone) }}" id="phone">
    <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
</div>
<div class="form-group">
    <label for="phone1"> @lang('transAdmin.phone') 2 </label>
    <input type="text" class='form-control {{ $errors->has('phone1') ? 'is-invalid' : '' }}' name="phone1"
        value="{{ old('phone1', $obj->phone1) }}" id="phone1">
    <div class="invalid-feedback">{{ $errors->first('phone1') }}</div>
</div>

<div class="form-group">
    <label for="email"> @lang('transAdmin.email') </label>
    <input type="text" class='form-control {{ $errors->has('email') ? 'is-invalid' : '' }}' name="email"
        value="{{ old('email', $obj->email) }}" id="email">
    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
</div>
