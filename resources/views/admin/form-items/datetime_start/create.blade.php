<div class=" form-group">
    <label for="datetime_start" class="">
        @lang('transAdmin.datetime-start') <span class="text-danger">*</span>
    </label>
    <div class="input-group date datepicker" id="datePickerExample">
        <input name="datetime_start" type="text" value="{{ old('datetime_start') }}" class="form-control"><span
            class="input-group-addon"><i data-feather="calendar"></i></span>
    </div>
</div>
