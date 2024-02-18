<div class=" form-group">
    <label for="image_ru">
        @lang('transAdmin.image') RU <span class="text-secondary">(300x300)</span>
    </label>
    <div class=" ">
        <div class="mb-3">

            @if ($obj->image_ru)
                <img src="{{ Storage::disk('local')->url('sm/' . $obj->image_ru) }}" alt="@lang('transAdmin.not-found')"
                    class="img-fluid w-25 image_ru_upload img-max o-25 border mb-1">
            @else
                <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')"
                    class="img-fluid w-25 image_ru_upload img-max o-25 border mb-1">
            @endif
        </div>
        <div class="input-group">
            <input id="image_ru" type="file"
                class="form-control file-upload-info {{ $errors->has('images') ? ' is-invalid' : '' }}" name="image_ru"
                accept="image/*" onChange="image_ruUpload(this);">
            <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Surat
                    ýükle</button>
            </span>
            {{-- <label class="custom-file-label" for="image">. . .</label> --}}
        </div>
        @if ($errors->has('image_ru'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('image_ru') }}</strong>
            </span>
        @endif
        <script>
            function image_ruUpload(input) {
                if (input.files && input.files[0]) {
                    var label = input.files[0].name;
                    $('#image_ru').next('label').text(label);
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.image_ru_upload').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </div>
</div>
