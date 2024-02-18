<div class=" form-group">
    <label for="body_ru">
        RU -
        @lang('transAdmin.body')
    </label>
    <div class=" ">
        <textarea class="form-control tinymce {{ $errors->has('body_ru') ? ' is-invalid' : '' }}" name="body_ru" id="body_ru"
            rows="10">{!! $obj->body_ru !!}</textarea>
        @if ($errors->has('body_ru'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('body_ru') }}</strong>
            </span>
        @endif
    </div>
</div>
