<div class=" form-group">
    <label for="discount_date_end" class="">
        @lang('transAdmin.discount-date-end') <span class="text-danger">*</span>
    </label>
    <div class="input-group date datepicker" id="discount_date_end">
        <input name="discount_date_end" type="text" value="{{ old('discount_date_end') }}" class="form-control"><span
            class="input-group-addon"><i data-feather="calendar"></i></span>
    </div>
</div>
