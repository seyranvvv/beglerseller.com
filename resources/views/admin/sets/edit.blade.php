@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.products')
@endsection
@section('content')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}" /> --}}


    @push('js')
        <script>
            $(document).ready(function() {
                $('.select2').select2({

                });
            });
        </script>
    @endpush

    <div class="d-flex flex-column justify-content-between">
        {{-- <div class="h4 mb-3">
            <a href="{{ route('admin.products.sets.index') }}">
                <i class="fas fa-caret-left"></i> @lang('transAdmin.sets')
            </a>
            <span class="text-gray-500">/</span>
            <a href="{{ route('admin.products.sets.show', $obj->id) }}">
                {!! $obj->getCode() !!}
            </a>
            <span class="text-gray-500">/</span>
            @lang('transAdmin.edit')
        </div> --}}


        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Toplumy üýtgetmek</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.products.sets.show', $obj->id) }}">
                        {!! $obj->getCode() !!}</a></li>
                <li class="breadcrumb-item active">Toplumy üýtgetmek</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="my-4">

                <form action="{{ route('admin.products.sets.update', $obj->id) }}" method="post">
                    {!! method_field('PUT') !!}
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class=" form-group">
                                <label for="category">
                                    @lang('transAdmin.category') <span class="text-danger">*</span>
                                </label>
                                <div class=" ">
                                    <select id="category"
                                        class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }} select2"
                                        name="category" required autofocus>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $obj->category_id == $category->id ? 'selected="selected"' : '' }}>
                                                {{ $category->getName() }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class=" form-group">
                                <label for="brand">
                                    @lang('transAdmin.brand') <span class="text-danger">*</span>
                                </label>
                                <div class=" ">
                                    <select id="brand"
                                        class="form-control {{ $errors->has('brand') ? ' is-invalid' : '' }} select2"
                                        name="brand" required>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ $obj->brand_id == $brand->id ? 'selected="selected"' : '' }}>
                                                {{ $brand->getName() }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('brand'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('brand') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-check ">
                                <label class="form-check-label  d-inline-block" for="status">
                                    <input type="checkbox" class="custom-control-input" id="status" name="status"
                                        value="1" {{ $obj->status == 1 ? 'checked' : '' }}>
                                    @lang('transAdmin.enable')
                                </label>
                            </div>

                            {{-- submit button --}}
                            <button type="submit" class="btn btn-primary mr-2">Üýtget</button>
                        </div>
                    </div>




                </form>
            </div>
        </div>
    </div>
@endsection
