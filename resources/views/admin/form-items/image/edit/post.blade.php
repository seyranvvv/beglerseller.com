<div class=" form-group">
    <label for="image">
        @lang('transAdmin.image') <span class="text-secondary">(900x600)</span>
    </label>
    <div class=" ">
        <div class="mb-3">
            @if ($obj->image)
                <img src="{{ Storage::disk('local')->url('sm/' . $obj->image) }}" alt="{{ $obj->image }}"
                    class="img-fluid  w-25  image_upload img-max border">
            @else
                <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')"
                    class="img-fluid w-25 image_upload img-max border">
            @endif
        </div>
        <div class="input-group">
            <input id="image" type="file"
                class="form-control file-upload-info {{ $errors->has('image') ? ' is-invalid' : '' }}" name="image"
                accept="image/*" onChange="imageUpload(this);">
            <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Surat
                    ýükle</button>
            </span>
            {{-- <label class="custom-file-label" for="image">. . .</label> --}}
        </div>
        @if ($errors->has('image'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
        <script>
            function imageUpload(input) {
                if (input.files && input.files[0]) {
                    var label = input.files[0].name;
                    $('#image').next('label').text(label);
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.image_upload').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </div>
</div>
