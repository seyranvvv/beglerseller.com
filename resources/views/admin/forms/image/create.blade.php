<div class=" form-group">
    <label for="{{ $name }}">
        {{ $label }} <span class="text-secondary">({{ $resolution }})</span>
    </label>
    <div class=" ">
        <div class="mb-3">

            <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')"
                class="img-fluid w-25 {{ $name }}_upload img-max o-25 border mb-1">
        </div>
        <div class="input-group">
            <input  id="{{ $name }}" type="file"
                class="form-control file-upload-info {{ $errors->has($name) ? ' is-invalid' : '' }}"
                name="{{ $name }}" accept="image/*" onChange="{{ $name }}Upload(this);">
            <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">
                    Surat ýükle
                </button>
            </span>
            {{-- <label class="custom-file-label" for="image">. . .</label> --}}
        </div>
        @if ($errors->has($name))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first($name) }}</strong>
            </span>
        @endif
        <script>
            function {{ $name }}Upload(input) {
                if (input.files && input.files[0]) {
                    var label = input.files[0].name;
                    $('#{{ $name }}').next('label').text(label);
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.{{ $name }}_upload').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </div>
</div>
