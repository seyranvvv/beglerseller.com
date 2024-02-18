<div class=" form-group">
    <label for="percent" class="">
        @lang('transAdmin.discount-percent') <span class="text-danger">*</span>
    </label>
    <div class="">
        <input id="percent" type="number" min="0"
            class="form-control{{ $errors->has('percent') ? ' is-invalid' : '' }}" name="percent"
            value="{{ old('percent') }}" required>
        @if ($errors->has('percent'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('percent') }}</strong>
            </span>
        @endif
    </div>
</div>
