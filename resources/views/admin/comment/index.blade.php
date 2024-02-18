@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.locations')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-3">@lang('transAdmin.comments')</div>
        {{--        <a href="{{ route('admin.locations.create') }}" class="btn btn-primary"> --}}
        {{--            + @lang('transAdmin.comments') --}}
        {{--        </a> --}}
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>{{-- @lang('transAdmin.sort-order') --}}</th>
                        <th>@lang('transAdmin.customer')</th>
                        <th>@lang('transAdmin.body')</th>
                        <th>@lang('transAdmin.stars')</th>
                        <th>@lang('transAdmin.home_page')</th>
                        <th>@lang('transAdmin.accepted')</th>
                        {{--            <th>@lang('transAdmin.enable')</th> --}}
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($objs as $obj)
                        <tr>
                            <td></td>
                            <td>
                                <div>{{ $obj->customer->name }}</div>
                            </td>
                            <td>
                                {!! $obj->body !!}
                            </td>
                            <td>
                                {{ $obj->stars }}
                            </td>
                            <td>
                                <span class="badge {{ $obj->home_page == 1 ? 'badge-info' : 'badge-danger' }} text-md">
                                    {{ $obj->home_page == 1 ? trans('transAdmin.enable') : trans('transAdmin.disable') }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $obj->accepted == 1 ? 'badge-info' : 'badge-danger' }} text-md">
                                    {{ $obj->accepted == 1 ? trans('transAdmin.enable') : trans('transAdmin.disable') }}
                                </span>
                            </td>
                            <td>


                                <div class="d-flex flex-row">
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="dropdownMenuButton3"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">

                                            <a class="dropdown-item d-flex align-items-center"
                                                href="{{ route('admin.comments.edit', $obj->id) }}">
                                                <i data-feather="edit" class=" icon-sm mr-2"></i>
                                                <span class="">Üýtgetmek</span>
                                            </a>


                                            <a href="#" class="dropdown-item d-flex align-items-center"
                                                data-target="#d{{ $obj->id }}" data-toggle="modal">
                                                <i data-feather="trash" class=" icon-sm mr-2"></i>
                                                <span class="">Pozmak</span>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="d{{ $obj->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div>
                                                    #"{{ $obj->id }}" comment @lang('transAdmin.are-you-sure-want-to-delete')
                                                    <div class="mt-2 small">
                                                        <span class="text-danger font-weight-bold">@lang('transAdmin.be-carefully')</span>
                                                        <div>
                                                            #{!! $obj->id !!} comment
                                                            @lang('transAdmin.will-be-deleted')
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-right">
                                                <form action="{{ route('admin.comments.delete', $obj->id) }}"
                                                    method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="button" class="btn btn-sm btn-success"
                                                        data-dismiss="modal">@lang('transAdmin.cancel')
                                                    </button>
                                                    <button type="submit"
                                                        class="btn btn-dark btn-sm">@lang('transAdmin.delete')</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center bg-light text-secondary">
                                <i class="fas fa-exclamation-circle"></i> @lang('transAdmin.comments') @lang('transAdmin.not-found')
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
