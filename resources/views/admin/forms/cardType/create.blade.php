<div class=" form-group">
    <label for="category_id">
        Görnüşi
    </label>
    <div class=" ">
        <select required id="category_id" class="form-control select2 {{ $errors->has('category_id') ? ' is-invalid' : '' }}"
            name="category_id">
            @foreach ($cardTypes as $cardType)
                <option value="{{ $cardType->id }}">
                    {{ $cardType->name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('category_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('category_id') }}</strong>
            </span>
        @endif
    </div>
</div>
