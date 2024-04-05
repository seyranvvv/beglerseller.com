<div class="col-12">
    <label for="{{ $id }}" class="form-label">{{ $label }} <span class="text-danger">*</span></label>
    <input type="password" class="form-control" name="{{ $name }}" id="{{ $id }}"
        value="{{ old($name, $value) }}" required autocomplete="off">
    <div class="invalid-feedback" style="display: block;">{{ $errors->first($name) }}</div>
</div>
