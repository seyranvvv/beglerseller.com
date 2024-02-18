<div class="form-check ">
    <label class="form-check-label  d-inline-block" for="daily">
        <input {{ $obj->daily == 1 ? 'checked' : '' }} type="checkbox" class="custom-control-input" id="daily"
            name="daily" value="1">
        @lang('transAdmin.daily')
    </label>
</div>
