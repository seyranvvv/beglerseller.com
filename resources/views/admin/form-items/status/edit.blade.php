<div class="form-check ">
    <label class="form-check-label  d-inline-block" for="status">
        <input {{ $obj->status == 1 ? 'checked' : '' }} type="checkbox" class="custom-control-input" id="status"
            name="status" value="1">
        @lang('transAdmin.enable')
    </label>
</div>
