@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.tracks')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h4 mb-3">
            <a href="{{ route('admin.tracks.index') }}">
                <i class="fas fa-caret-left"></i> @lang('transAdmin.tracks')
            </a>
            <span class="text-gray-500">/</span>
            @lang('transAdmin.edit')
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <form action="{{ route('admin.tracks.update', $obj->id) }}" method="post">
                    {!! method_field('PUT') !!}
                    {!! csrf_field() !!}

                    <div class=" form-group">
                        <label for="name_tm" class="col-lg-4 col-md-4 col-form-label text-md-right">
                            <img src="{!! asset('img/flags/tkm.png') !!}" alt="TKM" class="border mr-1">
                            @lang('transAdmin.name') <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-4 col-md-8">
                            <input id="name_tm" type="text"
                                class="form-control{{ $errors->has('name_tm') ? ' is-invalid' : '' }}" name="name_tm"
                                value="{{ $obj->name_tm }}" required autofocus>
                            @if ($errors->has('name_tm'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name_tm') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class=" form-group">
                        <label for="name_ru" class="col-lg-4 col-md-4 col-form-label text-md-right">
                            <img src="{!! asset('img/flags/rus.png') !!}" alt="RUS" class="border mr-1">
                            @lang('transAdmin.name')
                        </label>
                        <div class="col-lg-4 col-md-8">
                            <input id="name_ru" type="text"
                                class="form-control{{ $errors->has('name_ru') ? ' is-invalid' : '' }}" name="name_ru"
                                value="{{ $obj->name_ru }}">
                            @if ($errors->has('name_ru'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name_ru') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class=" form-group">
                        <label for="name_en" class="col-lg-4 col-md-4 col-form-label text-md-right">
                            <img src="{!! asset('img/flags/eng.png') !!}" alt="ENG" class="border mr-1">
                            @lang('transAdmin.name')
                        </label>
                        <div class="col-lg-4 col-md-8">
                            <input id="name_en" type="text"
                                class="form-control{{ $errors->has('name_en') ? ' is-invalid' : '' }}" name="name_en"
                                value="{{ $obj->name_en }}">
                            @if ($errors->has('name_en'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name_en') }}</strong>
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
