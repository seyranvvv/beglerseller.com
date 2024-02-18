<div class="form-check ">
    <label class="form-check-label  d-inline-block" for=" filter">
        <input {{ $obj->filter == 1 ? 'checked' : '' }} type="checkbox" class="custom-control-input" id=" filter"
            name=" filter" value="1">
        @lang('transAdmin.show-in-filter')
    </label>
</div>
