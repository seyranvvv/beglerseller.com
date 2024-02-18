<div class=" form-group">
    <label for="date_available" class="">
        @lang('transAdmin.date-available') <span class="text-danger">*</span>
    </label>
    <div class="input-group date datepicker" id="datePickerExample">
        <input name="date_available" type="text"
            value="{{ old('date_available', $obj->date_available->format('d.m.Y')) }}" class="form-control"><span
            class="input-group-addon"><i data-feather="calendar"></i></span>
    </div>
</div>
