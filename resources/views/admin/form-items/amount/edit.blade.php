<div class=" form-group">
    <label for="amount">
        @lang('transAdmin.amount') <span class="text-danger">*</span>
    </label>
    <div class=" ">
        <input id="amount" type="number" min="0"
            class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount"
            value="{{ old('amount', $obj->amount) }}" required>
        @if ($errors->has('amount'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('amount') }}</strong>
            </span>
        @endif
    </div>
</div>
