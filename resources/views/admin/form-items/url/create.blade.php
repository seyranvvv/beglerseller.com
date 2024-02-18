<div class=" form-group">
    <label for="url">
        @lang('transAdmin.url') <span class="text-danger">*</span>
    </label>
    <div class=" ">
        <input id="url" type="text" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}"
            name="url" value="{{ old('url') }}" required>
        @if ($errors->has('url'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('url') }}</strong>
            </span>
        @endif
    </div>
    @push('js')
        <script>
            var timer;
            $('#name_tm').keyup(function() {
                clearTimeout(timer);
                timer = setTimeout(function() {
                    $.ajax({
                        url: "{!! route('admin.products.url') !!}",
                        dataType: "json",
                        type: "GET",
                        data: {
                            "url": $('#name_tm').val()
                        },
                        success: function(result, status, xhr) {
                            $("#url").val(result["url"]);
                        },
                    });
                }, 500);
            });
        </script>
    @endpush
</div>
