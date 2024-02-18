<div class="form-group ">
    <label for="logo" class=" text-md-right">
        @lang('transAdmin.logo') <span class="text-secondary"></span>
    </label>
    <div class="">
        <div class="mb-3 w-25
        ">
            @if ($obj->getFirstMediaUrl('logos'))
                <img src="{{ $obj->getFirstMediaUrl('logos') }}" alt="{{ $obj->name }}"
                    class="img-fluid image_upload img-max border">
            @else
                <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')"
                    class="img-fluid image_upload img-max border">
            @endif
        </div>
        <div class="input-group">
            <input id="logo" type="file"
                class="form-control file-upload-info {{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo"
                accept="image/*" placeholder="Surat ýükle" onChange="imageUpload(this);">
            <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Surat
                    ýükle</button>
            </span>
            {{-- <label class="custom-file-label" for="logo">. . .</label> --}}
        </div>
        @if ($errors->has('logo'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('logo') }}</strong>
            </span>
        @endif
        @push('js')
            <script>
                function imageUpload(input) {
                    if (input.files && input.files[0]) {
                        var label = input.files[0].name;
                        $('#logo').next('label').text(label);
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('.image_upload').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
        @endpush
    </div>
</div>
