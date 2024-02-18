@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.contacts')
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
        <div class="h3 mb-3">Requests</div>
        {{-- <a href="{{ route('admin.contacts.create') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-plus"></i>+ @lang('transAdmin.contact')
        </a> --}}
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table bg-white mt-4">
                <thead>
                    <tr>
                        <th>@lang('transAdmin.name')</th>
                        <th>@lang('transAdmin.phone')</th>
                        <th>@lang('transAdmin.email')</th>
                        <th>@lang('transAdmin.body')</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse($objs as $obj)
                        <tr>
                            @include('admin.requests.index.name')
                            @include('admin.requests.index.phone')
                            @include('admin.requests.index.mail')
                            @include('admin.requests.index.body')

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center bg-light text-secondary">
                                <i class="fas fa-exclamation-circle"></i> @lang('transAdmin.contact') @lang('transAdmin.not-found')
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
