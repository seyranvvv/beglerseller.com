@extends('admin.layouts.app')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h4 mb-3">
            <a href="{{ route('admin.exchange.index') }}">
                <i class="fas fa-caret-left"></i> @lang('transFront.contact')
            </a>
            <span class="text-gray-500">/</span>
            @lang('transAdmin.edit')
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <form action="{{ route('admin.exchange.update', $obj->id) }}" method="post">
                    {!! method_field('PUT') !!}
                    {!! csrf_field() !!}


                    <div class=" form-group">
                        <label for="course">
                            @lang('transAdmin.price') <span class="text-danger">*</span>
                        </label>
                        <div class=" ">
                            <input id="course" type="number" min="1" step="0.1"
                                class="form-control{{ $errors->has('course') ? ' is-invalid' : '' }}" name="course"
                                value="{{ $obj->course }}" required>
                            @if ($errors->has('course'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('course') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    {{-- submit button --}}
                    <div class=" form-group mb-0">
                        <div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> @lang('transAdmin.save')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
