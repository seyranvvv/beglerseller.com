@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.options')
@endsection
@section('content')
    <div class="float-left">
        <h4 class="mb-3 mb-md-0 ">Täze aýratynlyk goşmak</h4>
    </div>
    <div class="clearfix mb-3"></div>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.options.index') }}">Aýratynlyk</a></li>
            <li class="breadcrumb-item active">Aýratynlyk goşmak</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <div class="my-4">

                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.options.store') }}" method="post">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label for="name_tm"> @lang('transAdmin.name') TM</label>
                                <input type="text" class="form-control {{ $errors->has('name_tm') ? 'is-invalid' : '' }}"
                                    name="name_tm" value="{{ old('name_tm') }}" id="name_tm">
                                <div class="invalid-feedback">{{ $errors->first('name_tm') }}</div>
                            </div>

                            <div class="form-group">
                                <label for="name_ru"> @lang('transAdmin.name') RU</label>
                                <input type="text" class="form-control {{ $errors->has('name_ru') ? 'is-invalid' : '' }}"
                                    name="name_ru" value="{{ old('name_ru') }}" id="name_ru">
                                <div class="invalid-feedback">{{ $errors->first('name_ru') }}</div>
                            </div>
                            <div class="form-group">
                                <label for="name_en"> @lang('transAdmin.name') EN</label>
                                <input type="text" class="form-control {{ $errors->has('name_en') ? 'is-invalid' : '' }}"
                                    name="name_en" value="{{ old('name_en') }}" id="name_en">
                                <div class="invalid-feedback">{{ $errors->first('name_en') }}</div>
                            </div>

                            <div class="form-check ">
                                <label class="form-check-label  d-inline-block" for="customControlFilter">
                                    <input type="checkbox" class="custom-control-input" id="customControlFilter"
                                        name="filter" value="1">
                                    @lang('transAdmin.show-in-filter')
                                </label>
                            </div>

                            <div class="form-check ">
                                <label class="form-check-label  d-inline-block" for="customControlDetail">
                                    <input type="checkbox" class="custom-control-input" id="customControlDetail"
                                        name="detail" value="1">
                                    @lang('transAdmin.show-in-detail')
                                </label>
                            </div>





                            <div class="form-check ">
                                <label class="form-check-label  d-inline-block" for="status">
                                    <input type="checkbox" class="custom-control-input" id="status" name="status"
                                        value="1">
                                    @lang('transAdmin.enable')
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="sort_order">@lang('transAdmin.sort-order')</label>
                                <input type="number"
                                    class="form-control {{ $errors->has('sort_order') ? 'is-invalid' : '' }}"
                                    name="sort_order" min="0" value="{{ old('sort_order', 1) }}" id="sort_order">
                                <div class="invalid-feedback">{{ $errors->first('sort_order') }}</div>
                            </div>
                            {{-- submit button --}}
                            <button type="submit" class="btn btn-primary mr-2">Goş</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
