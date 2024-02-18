<div class=" form-group">
    <label for="datetime_end" class="">
        @lang('transAdmin.date-start') <span class="text-danger">*</span>
    </label>
    <div class="input-group date datepicker" id="datePickerExample">
        <input name="datetime_end" type="text" value="{{ old('datetime_end', $obj->datetime_end->format('d.m.Y')) }}"
            class="form-control"><span class="input-group-addon"><i data-feather="calendar"></i></span>
    </div>
</div>
