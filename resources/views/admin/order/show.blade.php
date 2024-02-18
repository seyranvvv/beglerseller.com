@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.orders')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">

        <div class="justify-content-between align-items-center flex-wrap">

            <div class="float-left">
                <h4 class="mb-3 mb-md-0 ">Sargyt üýtgetmek</h4>
            </div>
            <div class="clearfix mb-3"></div>
            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href{{ route('admin.orders.index.status', $obj->status) }}">Sargytlar</a>
                    </li>
                    <li class="breadcrumb-item active">Sargyt üýtgetmek</li>
                </ol>
            </nav>
        </div>

        <div>


            <a href="{{ route('admin.orders.edit', $obj->id) }}" class="btn btn-warning text-white mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-edit">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg> Üýtgetmek
            </a>
            <button type="button" class="btn  btn-danger  mb-1" data-toggle="modal" data-target="#d{{ $obj->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-trash">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                </svg> Pozmak
            </button>
            <!-- Modal -->
            <div class="modal fade" id="d{{ $obj->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div>
                                "<span class="font-weight-bold text-dark">{{ $obj->getName() }}</span>" @lang('transAdmin.are-you-sure-want-to-delete')
                                <div class="mt-2 small">
                                    <span class="text-danger font-weight-bold">@lang('transAdmin.be-carefully')</span>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-right">
                            <form action="{{ route('admin.orders.delete', $obj->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">@lang('transAdmin.cancel')
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
            <div class="row my-2">
                <div class="col-lg-8">
                    <div class="card shadow my-3">
                        <div class="card-header py-3">
                            <div class="h6 mb-0">
                                @lang('transAdmin.products')
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table  mb-0">
                                <tbody>
                                    @forelse($obj->products as $product)
                                        <tr>
                                            <td width="15%" class="p-1 align-middle">
                                                @if ($product->product->image)
                                                    <img src="{{ Storage::disk('local')->url('th/' . $product->product->image) }}"
                                                        alt="{{ $product->product->image }}" class=""
                                                        style="border-radius: unset; height: 70px; width: auto">
                                                @else
                                                    <img src="{{ asset('img/temp/product-th.png') }}"
                                                        alt="@lang('transAdmin.not-found')" class=""
                                                        style="border-radius: unset; height: 70px; width: auto">
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <a href="{!! route('admin.products.show', $product->product->id) !!}" class="text-dark">{!! $product->product->getName() !!}
                                                </a>
                                                <div class="small">
                                                    <i class="mdi mdi-barcode text-primary"></i>
                                                    <span class="text-monospace text-danger">
                                                        {!! $product->product->barcode !!}
                                                    </span>
                                                </div>
                                                <div class="small">
                                                    <span class="text-secondary">@lang('transAdmin.brand'):</span>
                                                    {!! $product->product->set->brand->getName() !!}
                                                </div>
                                                @foreach ($product->product->values as $value)
                                                    <small class="text-secondary">
                                                        {!! $value->option->getName() !!}:
                                                        <span
                                                            class="text-body">{!! $value->getName() !!}</span>{!! $loop->last ? '' : ',' !!}
                                                    </small>
                                                @endforeach
                                            </td>
                                            <td class="align-middle">
                                                <div class="">
                                                    @if ($obj->editable())
                                                        <a href="{!! route('admin.orders.product.increase', $product->id) !!}" class="text-warning small">
                                                            <i class="icon-sm" data-feather="plus"></i>
                                                        </a>
                                                        <br>
                                                    @endif
                                                    <span class="">
                                                        <span class="font-weight-bold">
                                                            {!! $product->amount !!}
                                                        </span>
                                                        x {!! number_format((float) $product->price, 2, '.', '') !!}
                                                        <small>TMT</small>
                                                    </span>
                                                    @if ($obj->editable())
                                                        <br>
                                                        <a href="{!! route('admin.orders.product.decrease', $product->id) !!}" class="text-warning small">

                                                            <i class="icon-sm" data-feather="minus"></i>

                                                        </a>
                                                    @endif
                                                </div>
                                                @if ($product->discount_percent > 0)
                                                    <span class="badge badge-danger">
                                                        -{!! $product->discount_percent !!}<small>%</small>
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center" width="15%">
                                                <span class="font-weight-bold text-primary">
                                                    {!! number_format((float) $product->total_price, 2, '.', '') !!}
                                                    <small>TMT</small>
                                                </span>
                                                @if ($obj->editable())
                                                    <!-- Button trigger modal -->
                                                    <a href="#" class="text-secondary small ml-1"
                                                        data-toggle="modal" data-target="#prod{{ $product->id }}">
                                                        <i data-feather="trash" class="icon-sm mb-1 text-dark"></i>
                                                    </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="prod{{ $product->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <div class="text-md">
                                                                        <div>
                                                                            "{!! $product->product->getName() !!}" @lang('transAdmin.are-you-sure-want-to-delete')
                                                                        </div>
                                                                    </div>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-right">
                                                                    <form
                                                                        action="{{ route('admin.orders.product.delete', $product->id) }}"
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
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center bg-light text-secondary">
                                                <i data-feather="info"></i> @lang('transAdmin.product')
                                                @lang('transAdmin.not-found')
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow my-3">
                        <div class="card-header py-3">
                            <div class="h6 mb-0">
                                @lang('transAdmin.price')
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="font-weight-bold">
                                <div>
                                    <i class="icon-sm text-success" data-feather="shopping-bag"></i>
                                    {!! number_format((float) $obj->products_price, 2, '.', '') !!} <small>TMT</small>
                                    &nbsp; -{!! $obj->discount_day_percent !!}<small>%</small>
                                    @if ($obj->discountDays->count() > 0)
                                        <span class="text-secondary small">({!! $obj->discountDays->first()->getName() !!})</span>
                                    @endif
                                </div>
                                <div class="mt-1">
                                    <i class="icon-sm text-success" data-feather="truck"></i>
                                    {!! number_format((float) $obj->shipping_fee, 2, '.', '') !!} <small>TMT</small>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="h5 mb-0">
                                <span class="text-primary font-weight-bold">
                                    {!! number_format((float) $obj->total_price, 2, '.', '') !!}
                                    <small>TMT</small>
                                </span>
                                @if ($obj->payment())
                                    <i class="icon-sm text-dark" data-feather="chevron-right"></i>
                                    @if ($obj->paid == 0)
                                        <a href="{{ route('admin.orders.pay', $obj->id) }}"
                                            class="font-weight-bold btn btn-danger btn-sm">
                                            {!! $obj->payment() !!}, {!! $obj->paid() !!}</a>
                                    @else
                                        <span class="text-danger font-weight-bold">
                                            {!! $obj->payment() !!}
                                        </span>
                                        <span class="text-success font-weight-bold">{!! $obj->paid() !!}</span>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card shadow my-3">
                        <div class="card-header py-3">
                            <div class="h6 mb-0">
                                @lang('transAdmin.enable')
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div>
                                <span class="mr-3">
                                    <i class="icon-sm text-dark mb-1" data-feather="arrow-down-circle"></i>
                                    {!! $obj->created_at->format('Y-m-d H:i') !!}
                                </span>
                                <span>
                                    <i class="icon-sm text-primary " data-feather="truck"></i>
                                    {!! $obj->date_delivery->format('Y-m-d') !!}
                                </span>
                            </div>
                            <hr class="my-2">
                            @foreach ($obj->tracks as $track)
                                <span class="small">
                                    {!! $track->created_at->format('Y-m-d H:i') !!}
                                    <i class="icon-sm text-dark mb-1" data-feather="chevron-right"></i>
                                    <span class="text-danger">{!! $track->track->getName() !!}</span>
                                    @if ($track->note)
                                        <br>
                                        <span class="text-secondary">({!! $track->note !!})</span>
                                    @endif
                                </span>
                                <a href="{{ route('admin.orders.track.edit', $track->id) }}"
                                    class="text-success small ml-1">
                                    <i class="icon-sm text-success mb-1" data-feather="edit"></i>
                                </a>
                                <!-- Button trigger modal -->
                                <a href="#" class="text-secondary small ml-1" data-toggle="modal"
                                    data-target="#t{{ $track->id }}">
                                    <i class="icon-sm text-dark mb-1" data-feather="trash"></i>
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="t{{ $track->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="text-md">
                                                    <div>
                                                        "{!! $track->track->getName() !!}" @lang('transAdmin.are-you-sure-want-to-delete')
                                                    </div>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-right">
                                                <form action="{{ route('admin.orders.track.delete', $track->id) }}"
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
                                <br>
                            @endforeach
                            @if ($obj->addTrack())
                                <a href="{{ route('admin.orders.track.create', $obj->id) }}"
                                    class="btn btn-sm btn-warning mt-2 text-white">
                                    <i class="icon-sm text-white mb-1" data-feather="plus"></i> @lang('transAdmin.track')
                                </a>
                            @endif
                            @if ($obj->status != 5)
                                <a href="{{ route('admin.orders.track.cancel.create', $obj->id) }}"
                                    class="btn btn-sm btn-dark mt-2">
                                    <i class="icon-sm text-white     mb-1" data-feather="x"></i> @lang('transAdmin.cancel')
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="card shadow my-3">
                        <div class="card-header py-3">
                            <div class="h6 mb-0">
                                @lang('transAdmin.customer')
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="mb-1">
                                <i class="icon-sm text-dark mb-1" data-feather="user"></i>
                                {!! $obj->full_name !!}</a>
                                &nbsp;
                                <i class="icon-sm text-dark mb-1" data-feather="smartphone"></i>
                                {!! $obj->phone !!}
                            </div>
                            <div class="small">
                                {!! $obj->address !!}, {!! $obj->location->getName() !!}
                                <br>
                                @if ($obj->note)
                                    <div class="text-info">
                                        {!! $obj->note !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
