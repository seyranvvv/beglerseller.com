<div class=" form-group">
    <label for="type">
        Ýerleşýän ýeri
    </label>
    <div class=" ">
        <select id="type" class="form-control select2 {{ $errors->has('type') ? ' is-invalid' : '' }}" name="type">
            <option value="bottom">
                Aşak ()
            </option>
            <option value="left">
                Çep ()
            </option>
        </select>
        @if ($errors->has('type'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
        @endif
    </div>
</div>
