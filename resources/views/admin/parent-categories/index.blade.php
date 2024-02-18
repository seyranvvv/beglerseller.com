@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.categories')
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
        <div class="h3 mb-3">@lang('transAdmin.categories')</div>
        <a href="{{ route('admin.parent-categories.create') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-plus"></i>+ @lang('transAdmin.category')
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table bg-white mt-4">
                <thead>
                    <tr>
                        <th>@lang('transAdmin.name')</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($objs as $obj)
                        <tr>

                            @include('admin.parent-categories.index.order')
                            @include('admin.parent-categories.index.name')


                            @include('admin.parent-categories.index.buttons')
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center bg-light text-secondary">
                                <i class="fas fa-exclamation-circle"></i> @lang('transAdmin.category') @lang('transAdmin.not-found')
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
