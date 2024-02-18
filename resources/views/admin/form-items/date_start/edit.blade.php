<div class=" form-group">
    <label for="date_start" class="">
        @lang('transAdmin.date-start') <span class="text-danger">*</span>
    </label>
    <div class="input-group date datepicker" id="datePickerExample">
        <input name="date_start" type="text" value="{{ old('date_start', $obj->date_start->format('d.m.Y')) }}"
            class="form-control"><span class="input-group-addon"><i data-feather="calendar"></i></span>
    </div>
</div>
