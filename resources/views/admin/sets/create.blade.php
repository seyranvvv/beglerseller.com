@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.products')
@endsection
@section('content')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select2-bootstrap4.css') }}"/>
  --}}
    @push('js')
        <script>
            $(document).ready(function() {
                $('.select2').select2({
                    //  
                });
            });
        </script>
    @endpush
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Täze Toplum goşmak</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.products.sets.index') }}">Toplumlar</a></li>
                <li class="breadcrumb-item active">Toplum goşmak</li>
            </ol>
        </nav>
    </div>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.products.sets.store') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-6">


                                <div class="form-group ">
                                    <label for="category">
                                        @lang('transAdmin.category') <span class="text-danger">*</span>
                                    </label>

                                    <select id="category"
                                        class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }} select2"
                                        name="category" required autofocus>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->getName() }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif

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
                                                <option value="{{ $brand->id }}">{{ $brand->getName() }}</option>
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
                                            value="1">
                                        @lang('transAdmin.enable')
                                    </label>
                                </div>

                                {{-- submit button --}}
                                <button type="submit" class="btn btn-primary mr-2">Goş</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
