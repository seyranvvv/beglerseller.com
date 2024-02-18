<div class=" form-group">
    <label for="discount_percent" class="">
        @lang('transAdmin.discount-percent') <span class="text-danger">*</span>
    </label>
    <div class="">
        <input id="discount_percent" type="number" min="0"
            class="form-control{{ $errors->has('discount_percent') ? ' is-invalid' : '' }}" name="discount_percent"
            value="{{ old('discount_percent', $obj->discount_percent) }}">
        @if ($errors->has('discount_percent'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('discount_percent') }}</strong>
            </span>
        @endif
    </div>
</div>
