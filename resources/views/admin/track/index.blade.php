@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.tracks')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-3">@lang('transAdmin.tracks')</div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>@lang('transAdmin.name')</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($objs as $obj)
                        <tr>
                            <td>{!! $obj->id !!}</td>
                            <td>
                                <div class="mb-1">
                                    <img src="{!! asset('img/flags/tkm.png') !!}" alt="TKM" class="border mr-1">
                                    {!! $obj->name_tm !!}
                                </div>
                                <div class="mb-1">
                                    <img src="{!! asset('img/flags/rus.png') !!}" alt="RUS" class="border mr-1">
                                    {!! $obj->name_ru !!}
                                </div>
                                <div class="">
                                    <img src="{!! asset('img/flags/eng.png') !!}" alt="ENG" class="border mr-1">
                                    {!! $obj->name_en !!}
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.tracks.edit', $obj->id) }}"
                                    class="btn btn-outline-success btn-sm mb-1">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center bg-light text-secondary">
                                <i class="fas fa-exclamation-circle"></i> @lang('transAdmin.track') @lang('transAdmin.not-found')
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mb-4">
                {!! $objs->links() !!}
            </div>
        </div>
    </div>
@endsection
