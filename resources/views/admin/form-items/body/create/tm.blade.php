<div class=" form-group">
    <label for="body_tm">
        TM -
        @lang('transAdmin.body')
    </label>
    <div class=" ">
        <textarea class="form-control tinymce {{ $errors->has('body_tm') ? ' is-invalid' : '' }}" name="body_tm" id="body_tm"
            rows="10"></textarea>
        @if ($errors->has('body_tm'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('body_tm') }}</strong>
            </span>
        @endif
    </div>
</div>
