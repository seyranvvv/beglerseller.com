@foreach (LaravelLocalization::getSupportedLanguagesKeys() as $locale)
    <div class=" form-group">
        <label for="image_{{ $locale }}">
            @lang('transAdmin.image') {{ $locale }} <span class="text-secondary">({{ $resolution }})</span>
        </label>
        <div class=" ">
            <div class="mb-3">

                <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')"
                    class="img-fluid w-25 image_{{ $locale }}_upload img-max o-25 border mb-1">
            </div>
            <div class="input-group">
                <input  id="image_{{ $locale }}" type="file"
                    class="form-control file-upload-info {{ $errors->has('images') ? ' is-invalid' : '' }}"
                    name="image[{{ $locale }}]" accept="image/*"
                    onChange="image_{{ $locale }}Upload(this);">
                <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">
                        Surat ýükle
                    </button>
                </span>
                {{-- <label class="custom-file-label" for="image">. . .</label> --}}
            </div>
            @if ($errors->has("image_$locale"))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first("image_$locale") }}</strong>
                </span>
            @endif
            <script>
                function image_{{ $locale }}Upload(input) {
                    if (input.files && input.files[0]) {
                        var label = input.files[0].name;
                        $('#image_{{ $locale }}').next('label').text(label);
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('.image_{{ $locale }}_upload').attr('src', e.target.result);
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
        </div>
    </div>
@endforeach
