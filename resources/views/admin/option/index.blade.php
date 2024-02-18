@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.options')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-3">@lang('transAdmin.options')</div>
        <a href="{{ route('admin.options.create') }}" class="btn btn-primary">
            + @lang('transAdmin.option')
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>@lang('transAdmin.sort-order')</th>
                        <th>@lang('transAdmin.name')</th>
                        <th>@lang('transAdmin.values')</th>
                        <th>@lang('transAdmin.show-in-filter')</th>
                        <th>@lang('transAdmin.show-in-detail')</th>
                        <th>@lang('transAdmin.enable')</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($objs as $obj)
                        <tr>
                            <td>{!! $obj->sort_order !!}</td>
                            <td>
                                <div class="mb-1">
                                    TM -
                                    {!! $obj->name_tm !!}
                                </div>
                                <div class="mb-1">
                                    RU -
                                    {!! $obj->name_ru !!}
                                </div>
                                <div class="">
                                    EN -
                                    {!! $obj->name_en !!}
                                </div>
                            </td>
                            <td class="p-1">
                                <table class="table-sm text-center w-100">
                                    <tbody>
                                        @forelse($obj->values as $value)
                                            <tr>
                                                <td>{{ $value->getName() }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $value->status == 1 ? 'badge-info' : 'badge-danger' }} text-md">
                                                        {{ $value->status == 1 ? trans('transAdmin.enable') : trans('transAdmin.disable') }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-row">
                                                        <div class="dropdown">
                                                            <button class="btn p-0" type="button" id="dropdownMenuButton3"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="icon-lg text-muted pb-3px"
                                                                    data-feather="more-horizontal"></i>
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuButton3">

                                                                <a class="dropdown-item d-flex align-items-center"
                                                                    href="{{ route('admin.options.values.edit', $value->id) }}">
                                                                    <i data-feather="edit" class=" icon-sm mr-2"></i>
                                                                    <span class="">Üýtgetmek</span>
                                                                </a>
                                                                <a href="#"
                                                                    class="dropdown-item d-flex align-items-center"
                                                                    data-target="#v{{ $value->id }}" data-toggle="modal">
                                                                    <i data-feather="trash" class=" icon-sm mr-2"></i>
                                                                    <span class="">Pozmak</span>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- Modal -->
                                                    <div class="modal fade" id="v{{ $value->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <div class="text-md">
                                                                        <div>
                                                                            "{{ $value->getName() }}" @lang('transAdmin.are-you-sure-want-to-delete')
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-right">
                                                                    <form
                                                                        action="{{ route('admin.options.values.delete', $value->id) }}"
                                                                        method="post">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-success"
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
                                                <td colspan="3" class="text-center bg-light text-secondary">
                                                    <i class="fas fa-exclamation-circle"></i> @lang('transAdmin.value')
                                                    @lang('transAdmin.not-found')
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <i
                                    class="fas {{ $obj->filter == 1 ? 'fa-check-circle text-info' : 'fa-times-circle text-danger' }}"></i>
                            </td>
                            <td>
                                <i
                                    class="fas {{ $obj->detail == 1 ? 'fa-check-circle text-info' : 'fa-times-circle text-danger' }}"></i>
                            </td>
                            <td>
                                <span class="badge {{ $obj->status == 1 ? 'badge-info' : 'badge-danger' }} text-md">
                                    {{ $obj->status == 1 ? trans('transAdmin.enable') : trans('transAdmin.disable') }}
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
                                                href="{{ route('admin.options.values.create', $obj->id) }}">
                                                <i data-feather="plus-circle" class=" icon-sm mr-2"></i>
                                                <span class="">Görnüş</span>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center"
                                                href="{{ route('admin.options.edit', $obj->id) }}">
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


                                <!-- Modal -->
                                <div class="modal fade" id="d{{ $obj->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div>
                                                    "{{ $obj->getName() }}" @lang('transAdmin.are-you-sure-want-to-delete')
                                                    <div class="mt-2 small">
                                                        <span
                                                            class="text-danger font-weight-bold">@lang('transAdmin.be-carefully')</span>
                                                        <div>
                                                            {!! $obj->values_count !!} @lang('transAdmin.value')
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
                                                <form action="{{ route('admin.options.delete', $obj->id) }}"
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
                            <td colspan="7" class="text-center bg-light text-secondary">
                                <i class="fas fa-exclamation-circle"></i> @lang('transAdmin.option') @lang('transAdmin.not-found')
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
