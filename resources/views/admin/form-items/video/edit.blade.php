<div class=" form-group">
    <label for="video">
        @lang('transAdmin.video') <span class="text-secondary"></span>
    </label>
    <div class=" ">

        <div class="input-group">
            <input id="video" type="file"
                class="form-control file-upload-info {{ $errors->has('video') ? ' is-invalid' : '' }}" name="video"
                accept="video/*">
            <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Video
                    ýükle</button>
            </span>
            {{-- <label class="custom-file-label" for="video">. . .</label> --}}
        </div>
        @if ($errors->has('video'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('video') }}</strong>
            </span>
        @endif

    </div>
</div>
