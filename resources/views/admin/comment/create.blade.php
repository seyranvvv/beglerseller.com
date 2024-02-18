@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.brands')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h4 mb-3">
            <a href="{{ route('admin.brands.index') }}">
                <i class="fas fa-caret-left"></i> @lang('transAdmin.brands')
            </a>
            <span class="text-gray-500">/</span>
            @lang('transAdmin.create')
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <form action="{{ route('admin.brands.store') }}" method="post">
                    {!! csrf_field() !!}

                    <div class=" form-group">
                        <label for="name" class="col-lg-4 col-md-4 col-form-label text-md-right">
                            @lang('transAdmin.name') <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-4 col-md-8">
                            <input id="name" type="text"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class=" form-group">
                        <label for="url" class="col-lg-4 col-md-4 col-form-label text-md-right">
                            @lang('transAdmin.url') <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-4 col-md-8">
                            <input id="url" type="text"
                                class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url"
                                value="{{ old('url') }}" required>
                            @if ($errors->has('url'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('url') }}</strong>
                                </span>
                            @endif
                        </div>
                        <script>
                            var timer;
                            $('#name').keyup(function() {
                                clearTimeout(timer);
                                timer = setTimeout(function() {
                                    $.ajax({
                                        url: "{!! route('admin.brands.url') !!}",
                                        dataType: "json",
                                        type: "GET",
                                        data: {
                                            "url": $('#name').val()
                                        },
                                        success: function(result, status, xhr) {
                                            $("#url").val(result["url"]);
                                        },
                                    });
                                }, 500);
                            });
                        </script>
                    </div>

                    <div class="form-check ">
                        <label class="form-check-label  d-inline-block" for="status">
                            <input type="checkbox" class="custom-control-input" id="status" name="status"
                                value="1">
                            @lang('transAdmin.enable')
                        </label>
                    </div>

                    {{-- submit button --}}

                    <button type="submit" class="btn btn-primary mr-2">Goş</button>

                </form>
            </div>
        </div>
    </div>
@endsection
