<div class=" form-group">
    <label for="banner_type_id">
        Görnüşi
    </label>
    <div class=" ">
        <select required id="banner_type_id" class="form-control select2 {{ $errors->has('banner_type_id') ? ' is-invalid' : '' }}"
            name="banner_type_id">
            @foreach ($bannerTypes as $bannerType)
                <option {{ $bannerType->id == $obj->type->id ? 'selected' : '' }} value="{{ $bannerType->id }}">
                    {{ $bannerType->name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('banner_type_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('banner_type_id') }}</strong>
            </span>
        @endif
    </div>
</div>
