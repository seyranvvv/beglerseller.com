<div class=" form-group">
    <label for="discount_date_start" class="">
        @lang('transAdmin.discount-date-start') <span class="text-danger">*</span>
    </label>
    <div class="input-group date datepicker" id="discount_date_start">
        <input name="discount_date_start" type="text"
            value="{{ old('discount_date_start', $obj->discount_date_start->format('d.m.Y')) }}" class="form-control"><span
            class="input-group-addon"><i data-feather="calendar"></i></span>
    </div>
</div>
