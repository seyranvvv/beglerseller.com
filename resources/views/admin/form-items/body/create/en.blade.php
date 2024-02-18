<div class=" form-group">
    <label for="body_en">
        EN -
        @lang('transAdmin.body')
    </label>
    <div class=" ">
        <textarea class="form-control tinymce {{ $errors->has('body_en') ? ' is-invalid' : '' }}" name="body_en" id="body_en"
            rows="10"></textarea>
        @if ($errors->has('body_en'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('body_en') }}</strong>
            </span>
        @endif
    </div>
</div>
