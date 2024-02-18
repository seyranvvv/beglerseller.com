<div class=" form-group">
    <label for="datetime" class="">
        @lang('transAdmin.datetime') <span class="text-danger">*</span>
    </label>
    <div class="input-group date datepicker" id="datePickerExample">
        <input required name="datetime" type="text" value="{{ old('datetime', $obj->datetime) }}"
            class="form-control"><span class="input-group-addon"><i data-feather="calendar"></i></span>
    </div>
</div>
