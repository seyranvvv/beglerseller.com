@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.locations')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-3">@lang('transAdmin.locations')</div>
        <a href="{{ route('admin.locations.create') }}" class="btn btn-primary">
            + @lang('transAdmin.location')
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>@lang('transAdmin.sort-order')</th>
                        <th>@lang('transAdmin.name')</th>
                        <th>@lang('transAdmin.shipping-fee')</th>
                        <th>@lang('transAdmin.min-order-fee')</th>
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
                            <td>
                                <span class="text-primary font-weight-bold">
                                    {!! number_format((float) $obj->shipping_fee, 2, '.', '') !!} <small>TMT</small>
                                </span>
                            </td>
                            <td>
                                <span class="text-primary font-weight-bold">
                                    {!! number_format((float) $obj->min_order_fee, 2, '.', '') !!} <small>TMT</small>
                                </span>
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
                                                href="{{ route('admin.locations.edit', $obj->id) }}">
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
                                                        <span class="text-danger font-weight-bold">@lang('transAdmin.be-carefully')</span>
                                                        <div>
                                                            {!! $obj->orders_count !!} @lang('transAdmin.order')
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
                                                <form action="{{ route('admin.locations.delete', $obj->id) }}"
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
                                <i class="fas fa-exclamation-circle"></i> @lang('transAdmin.location') @lang('transAdmin.not-found')
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
