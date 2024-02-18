@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.sliders')
@endsection
@section('content')
    @push('css')
        <style>
            td img {
                height: 200px !important;
                width: unset !important;
                border-radius: unset !important;
                object-fit: cover;
                object-position: center;
            }
        </style>
    @endpush
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-3">@lang('transAdmin.sliders')</div>
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-plus"></i>+ @lang('transAdmin.slider')
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table bg-white mt-4">
                <thead>
                    <tr>
                        <th>@lang('transAdmin.image')</th>
                        <th>@lang('transAdmin.title')</th>
                        <th width="25%">@lang('transAdmin.url')</th>

                        <th>@lang('transAdmin.enable')</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($objs as $obj)
                        <tr>
                            @include('admin.slider.index.images')
                            @include('admin.slider.index.title')
                            <td>{!! $obj->url !!}</td>
                            <td>
                                <span class="badge {{ $obj->status == 1 ? 'badge-info' : 'badge-danger' }} text-md">
                                    {{ $obj->status == 1 ? trans('transAdmin.enable') : trans('transAdmin.disable') }}
                                </span>
                            </td>
                            @include('admin.slider.index.buttons')
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center bg-light text-secondary">
                                <i class="fas fa-exclamation-circle"></i> @lang('transAdmin.slider') @lang('transAdmin.not-found')
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mb-4">
        {!! $objs->links() !!}
    </div>
@endsection
