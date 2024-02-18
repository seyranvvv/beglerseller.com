@foreach ($options as $option)
    <div class=" form-group">
        <label for="o{!! $option->id !!}">
            {{ $option->getName() }}
        </label>
        <div class=" ">
            <select id="o{!! $option->id !!}"
                class="form-control select2 {{ $errors->has('values') ? ' is-invalid' : '' }}" name="values[]"
                size="10">
                <option selected value>-</option>
                @foreach ($option->values as $value)
                    <option value="{{ $value->id }}">
                        {{ $value->getName() }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('values'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('values') }}</strong>
                </span>
            @endif
        </div>
    </div>
@endforeach
