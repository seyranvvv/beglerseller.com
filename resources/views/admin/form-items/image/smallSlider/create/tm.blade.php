<div class=" form-group">
    <label for="image_tm">
        @lang('transAdmin.image') TM <span class="text-secondary">(300x300)</span>
    </label>
    <div class=" ">
        <div class="mb-3">

            <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')"
                class="img-fluid w-25 image_tm_upload img-max o-25 border mb-1">
        </div>
        <div class="input-group">
            <input id="image_tm" type="file"
                class="form-control file-upload-info {{ $errors->has('images') ? ' is-invalid' : '' }}" name="image_tm"
                accept="image/*" onChange="image_tmUpload(this);">
            <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Surat
                    ýükle</button>
            </span>
            {{-- <label class="custom-file-label" for="image">. . .</label> --}}
        </div>
        @if ($errors->has('image_tm'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('image_tm') }}</strong>
            </span>
        @endif
        <script>
            function image_tmUpload(input) {
                if (input.files && input.files[0]) {
                    var label = input.files[0].name;
                    $('#image_tm').next('label').text(label);
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.image_tm_upload').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </div>
</div>
