<div class=" form-group">
    <label for="datetime_end" class="">
        @lang('transAdmin.datetime-end') <span class="text-danger">*</span>
    </label>
    <div class="input-group date datepicker" id="datePickerExample">
        <input name="datetime_end" type="text" value="{{ old('datetime_end') }}" class="form-control"><span
            class="input-group-addon"><i data-feather="calendar"></i></span>
    </div>
</div>
