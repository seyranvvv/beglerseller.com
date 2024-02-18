<div class=" form-group">
    <label for="categories">
        @lang('transAdmin.categories') <span class="text-danger">*</span>
    </label>
    <div class=" ">
        <select id="categories" class="form-control {{ $errors->has('categories') ? ' is-invalid' : '' }} select2"
            name="categories[]" multiple size="10" required autofocus>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ $obj->categories->contains($category->id) ? 'selected="selected"' : '' }}>
                    {{ $category->getName() }}</option>
            @endforeach
        </select>
        @if ($errors->has('categories'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('categories') }}</strong>
            </span>
        @endif
    </div>
</div>
