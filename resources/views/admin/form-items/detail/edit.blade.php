<div class="form-check ">
    <label class="form-check-label  d-inline-block" for="detail">
        <input {{ $obj->detail == 1 ? 'checked' : '' }} type="checkbox" class="custom-control-input" id="detail"
            name="detail" value="1">
        @lang('transAdmin.show-in-detail')

    </label>
</div>
