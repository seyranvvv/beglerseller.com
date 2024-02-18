<div class=" form-group">
    <label for="image">
        @lang('transAdmin.image') <span class="text-secondary">(1000x1000)</span>
    </label>
    <div class=" ">
        <div class="mb-3">
            @foreach ($obj->images as $image)
                <img src="{{ Storage::disk('local')->url('sm/' . $image->image) }}" alt="{{ $image->image }}"
                    class="img-fluid w-25 img-max border mb-1">
            @endforeach
            <span id="images_upload">
                @if ($obj->images->count() < 1)
                    <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')"
                        class="img-fluid img-max w-25  o-100 border mb-1">
                    <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')"
                        class="img-fluid img-max w-25  o-75 border mb-1">
                    <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')"
                        class="img-fluid w-25 img-max o-50 border mb-1">
                @endif
            </span>
            <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')"
                class="img-fluid w-25 img-max o-25 border mb-1">
        </div>
        <div class="input-group">
            <input id="images" type="file"
                class="form-control file-upload-info {{ $errors->has('images') ? ' is-invalid' : '' }}" name="images[]"
                multiple="multiple" accept="image/*" onChange="imagesUpload(this);">
            <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Surat
                    ýükle</button>
            </span>
            {{-- <label class="custom-file-label" for="image">. . .</label> --}}
        </div>
        @if ($errors->has('images'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('images') }}</strong>
            </span>
        @endif
        <script>
            function imagesUpload(input) {
                var label = input.files.length + ' ' + '@lang('transAdmin.product') ' + '@lang('transAdmin.image')'.toLowerCase() +
                    ' @lang('transAdmin.added')';
                $('#images').next('label').text(label.substr(0, 50));
                if (input.files && input.files[0]) {
                    document.getElementById('images_upload').innerHTML = '';
                    $(input.files).each(function(index) {
                        var reader = new FileReader();
                        reader.readAsDataURL(this);
                        reader.onload = function(e) {
                            document.getElementById('images_upload').innerHTML += '<img src=' + e.target.result +
                                ' class="img-fluid w-25 img-max border mb-1">';
                        }
                    });
                }
            }
        </script>
    </div>
</div>
