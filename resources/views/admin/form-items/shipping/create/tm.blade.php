<div class="form-group">
    <label for="shipping_tm"> @lang('transAdmin.shipping') TM</label>
    <input type="text"
        class="form-control {{ $errors->has('shipping_tm') ? 'is-invalid' : '' }}"
        name="shipping_tm" value="{{ old('shipping_tm') }}" id="shipping_tm">
    <div class="invalid-feedback">{{ $errors->first('shipping_tm') }}</div>
</div>
