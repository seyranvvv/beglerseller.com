<div class=" form-group">
    <label for="sort_order" class="">
        @lang('transAdmin.sort-order') <span class="text-danger">*</span>
    </label>
    <div class="">
        <input id="sort_order" type="number" min="1"
            class="form-control{{ $errors->has('sort_order') ? ' is-invalid' : '' }}" name="sort_order" value=""
            required>
        @if ($errors->has('sort_order'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('sort_order') }}</strong>
            </span>
        @endif
    </div>
</div>
