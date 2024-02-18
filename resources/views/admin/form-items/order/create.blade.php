<div class=" form-group">
    <label for="order" class="">
        @lang('transAdmin.sort-order') <span class="text-danger">*</span>
    </label>
    <div class="">
        <input id="order" type="number" min="1"
            class="form-control{{ $errors->has('order') ? ' is-invalid' : '' }}" name="order" value="1" required>
        @if ($errors->has('order'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('order') }}</strong>
            </span>
        @endif
    </div>
</div>
