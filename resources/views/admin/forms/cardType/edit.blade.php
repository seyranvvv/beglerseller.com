<div class=" form-group">
    <label for="card_type_id">
        Görnüşi
    </label>
    <div class=" ">
        <select required id="card_type_id" class="form-control select2 {{ $errors->has('card_type_id') ? ' is-invalid' : '' }}"
            name="card_type_id">
            @foreach ($cardTypes as $cardType)
                <option {{ $cardType->id == $obj->type->id ? 'selected' : '' }} value="{{ $cardType->id }}">
                    {{ $cardType->name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('card_type_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('card_type_id') }}</strong>
            </span>
        @endif
    </div>
</div>
