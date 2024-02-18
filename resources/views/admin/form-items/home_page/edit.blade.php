<div class="form-check ">
    <label class="form-check-label  d-inline-block" for="home_page">
        <input {{ $obj->home_page == 1 ? 'checked' : '' }} type="checkbox" class="custom-control-input" id="home_page"
            name="home_page" value="1">
        @lang('transAdmin.home')
    </label>
</div>
