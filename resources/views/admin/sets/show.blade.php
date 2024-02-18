@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.products')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="">
            <div class="float-left">
                <h4 class="mb-3 mb-md-0 ">@lang('transAdmin.sets')</h4>
            </div>
            <div class="clearfix mb-3"></div>
            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.products.sets.index') }}">@lang('transAdmin.sets')</a></li>
                    <li class="breadcrumb-item active"> {!! $obj->getCode() !!}</li>
                </ol>
            </nav>
        </div>

        {{-- <div class="h4 mb-3">
            <a href="{{ route('admin.products.sets.index') }}">
                <i class="fas fa-caret-left"></i> @lang('transAdmin.sets')
            </a>
            <span class="text-gray-500">/</span>
            {!! $obj->getCode() !!}
        </div> --}}

        <div>
            <a href="{{ route('admin.products.create', $obj->id) }}" class="btn  border border-primary btn-primary mb-1">
                + @lang('transAdmin.product')
            </a>

            <a href="{{ route('admin.products.sets.edit', $obj->id) }}" class="btn btn-warning text-white mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-edit">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg> @lang('transAdmin.set')
            </a>

            <!-- Button trigger modal -->
            <button type="button" class="btn  btn-danger  mb-1" data-toggle="modal" data-target="#d{{ $obj->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-trash">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                </svg> @lang('transAdmin.set')
            </button>
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
                                        {!! $obj->products_count !!} @lang('transAdmin.product')
                                        @lang('transAdmin.will-be-deleted')
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-right">
                            <form action="{{ route('admin.products.sets.delete', $obj->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="button" class="btn btn-sm btn-success"
                                    data-dismiss="modal">@lang('transAdmin.cancel')
                                </button>
                                <button type="submit" class="btn btn-dark btn-sm">@lang('transAdmin.delete')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">


            <table class="table my-4">
                <thead>
                    <tr>
                        <th>@lang('transAdmin.image')</th>
                        <th>@lang('transAdmin.name')</th>
                        <th>@lang('transAdmin.options')</th>
                        <th>@lang('transAdmin.price')</th>
                        <th>@lang('transAdmin.amount')</th>
                        <th>@lang('transAdmin.viewed')</th>
                        <th>@lang('transAdmin.enable')</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($obj->products as $obj)
                        <tr>
                            <td>
                                @if ($obj->image)
                                    <img src="{{ Storage::disk('local')->url('th/' . $obj->image) }}"
                                        alt="{{ $obj->image }}" class=" rounded-0">
                                @else
                                    <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')"
                                        class=" rounded-0">
                                @endif
                            </td>
                            <td>
                                <div class="mb-1">
                                    TM -
                                    {!! $obj->name_tm !!}
                                </div>
                                <div class="mb-1">
                                    RU -
                                    {!! $obj->name_ru !!}
                                </div>
                                <div class="mb-1">
                                    EN -
                                    {!! $obj->name_en !!}
                                </div>
                                <div>
                                    <i class="fas fa-barcode text-primary"></i>
                                    <span class="text-monospace text-danger">{!! $obj->barcode !!}</span>
                                </div>
                            </td>
                            <td>
                                @foreach ($obj->values as $value)
                                    <span class="text-secondary">{!! $value->option->getName() !!}:</span>
                                    {!! $value->getName() . ($loop->last ? '' : '<hr class="my-1">') !!}
                                @endforeach
                            </td>
                            <td>
                                @if ($obj->price())
                                    <s>{!! number_format((float) $obj->price, 2, '.', '') !!}</s>
                                    <br>
                                    <span class="text-danger font-weight-bold">
                                        {!! number_format((float) $obj->price(), 2, '.', '') !!}
                                        <small>TMT</small>
                                        <br>
                                        -{!! $obj->discount_percent !!}%
                                    </span>
                                @else
                                    <span class="text-primary font-weight-bold">{!! number_format((float) $obj->price, 2, '.', '') !!}
                                        <small>TMT</small></span>
                                @endif
                            </td>
                            <td>
                                <i class="fas fa-shopping-bag text-success"></i> {!! $obj->amount !!}
                            </td>
                            <td>
                                {!! $obj->viewed !!} <span class="small text-secondary">@lang('transAdmin.viewed')</span>
                            </td>
                            <td>
                                <span class="badge {{ $obj->status == 1 ? 'badge-info' : 'badge-danger' }} text-md">
                                    {{ $obj->status == 1 ? trans('transAdmin.enable') : trans('transAdmin.disable') }}
                                </span>
                                @if ($obj->selected)
                                    <br>
                                    @lang('transAdmin.selected-product')
                                @endif
                                @if ($obj->daily)
                                    <br>
                                    @lang('transAdmin.daily')
                                @endif
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
                                                href="{{ route('admin.products.show', $obj->id) }}">
                                                <i data-feather="grid" class=" icon-sm mr-2"></i>
                                                <span class="">Giňişleýin</span>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center"
                                                href="{{ route('admin.products.edit', $obj->id) }}">
                                                <i data-feather="edit" class=" icon-sm mr-2"></i>
                                                <span class="">Üýtgetmek</span>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center"
                                                href="{{ route('admin.products.clone', $obj->id) }}">
                                                <i data-feather="copy" class=" icon-sm mr-2"></i>
                                                <span class="">Kopýalamak</span>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center"
                                                href="{{ route('admin.products.refresh', $obj->id) }}">
                                                <i data-feather="rotate-ccw" class=" icon-sm mr-2"></i>
                                                <span class="">Refresh</span>
                                            </a>
                                            <a href="#" class="dropdown-item d-flex align-items-center"
                                                data-toggle="modal" data-target="#d{{ $obj->id }}">
                                                <i data-feather="trash" class=" icon-sm mr-2"></i>
                                                <span class="">Pozmak</span>
                                            </a>
                                        </div>
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
                                                                    {!! $obj->orders_count !!} @lang('transAdmin.order')
                                                                    @lang('transAdmin.product')
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
                                                        <form action="{{ route('admin.products.delete', $obj->id) }}"
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
                                    </div>
                                </div>
                                {{-- 
                                <a href="{{ route('admin.products.show', $obj->id) }}"
                                    class="btn btn-outline-primary btn-sm mb-1">
                                    <i class="fas fa-th-large"></i>
                                </a>
                                <br>
                                <a href="{{ route('admin.products.edit', $obj->id) }}"
                                    class="btn btn-outline-success btn-sm mb-1">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <br>
                                <a href="{{ route('admin.products.clone', $obj->id) }}"
                                    class="btn btn-outline-info btn-sm mb-1">
                                    <i class="fas fa-clone"></i>
                                </a>
                                <br>
                                <a href="{{ route('admin.products.refresh', $obj->id) }}"
                                    class="btn btn-outline-warning btn-sm mb-1">
                                    <i class="fas fa-redo-alt"></i>
                                </a> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center bg-light text-secondary">
                                <i class="fas fa-exclamation-circle"></i> @lang('transAdmin.product') @lang('transAdmin.not-found')
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
