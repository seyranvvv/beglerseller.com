<div class=" form-group">
    <label for="date_end" class="">
        @lang('transAdmin.date-end') <span class="text-danger">*</span>
    </label>
    <div class="input-group date datepicker" id="datePickerExample">
        <input name="date_end" type="text" value="{{ old('date_end') }}" class="form-control"><span
            class="input-group-addon"><i data-feather="calendar"></i></span>
    </div>
</div>
