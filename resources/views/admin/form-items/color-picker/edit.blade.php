<div class="form-group row">
    <label for="primary_color" class="col-lg-12 col-md-12 col-form-label text-md-left">
        @lang('transAdmin.primary_color')
    </label>
    <div class="col-lg-12 col-md-12">
        <div id="cp1" class="input-group mb-2" title="Using input value">
            <input type="text" name="primary_color" id="primary_color" class="form-control input-lg"
                value="{{ $obj->primary_color ?? '#ffffff' }}" />
            <span class="input-group-append">
                <span class="input-group-text colorpicker-input-addon"><i></i></span>
            </span>
        </div>
        @if ($errors->has('primary_color'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('primary_color') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="secondary_color" class="col-lg-12 col-md-12 col-form-label text-md-left">
        @lang('transAdmin.secondary_color')
    </label>
    <div class="col-lg-12 col-md-12">
        <div id="cp1" class="input-group mb-2" title="Using input value">
            <input type="text" name="secondary_color" id="secondary_color" class="form-control input-lg"
                value="{{ $obj->secondary_color ?? '#ffffff' }}" />
            <span class="input-group-append">
                <span class="input-group-text colorpicker-input-addon"><i></i></span>
            </span>
        </div>
        @if ($errors->has('secondary_color'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('secondary_color') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="base_color" class="col-lg-12 col-md-12 col-form-label text-md-left">
        @lang('transAdmin.base_color')
    </label>
    <div class="col-lg-12 col-md-12">
        <div id="cp1" class="input-group mb-2" title="Using input value">
            <input type="text" name="base_color" id="base_color" class="form-control input-lg"
                value="{{ $obj->base_color ?? '#ffffff' }}" />
            <span class="input-group-append">
                <span class="input-group-text colorpicker-input-addon"><i></i></span>
            </span>
        </div>
        @if ($errors->has('base_color'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('base_color') }}</strong>
            </span>
        @endif
    </div>
</div>
