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
        <a href="{{ route('admin.smallSlider.create') }}" class="btn btn-primary">
            + @lang('transAdmin.slider')
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>@lang('transAdmin.image')</th>
                        <th>@lang('transAdmin.title')</th>
                        <th width="25%">@lang('transAdmin.url')</th>
                        <th>@lang('transAdmin.type')</th>

                        <th>@lang('transAdmin.date-start')</th>
                        <th>@lang('transAdmin.date-end')</th>
                        <th>@lang('transAdmin.enable')</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($objs as $obj)
                        <tr>
                            <td>
                                @if ($obj->image_tm)
                                    <img src="{{ Storage::disk('local')->url('sm/' . $obj->image_tm) }}"
                                        alt="{{ $obj->image_tm }}" class="img-fluid img-max border">
                                @else
                                    <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')"
                                        class="img-fluid img-max border">
                                @endif
                                <hr class="my-1">
                                @if ($obj->image_ru)
                                    <img src="{{ Storage::disk('local')->url('sm/' . $obj->image_ru) }}"
                                        alt="{{ $obj->image_ru }}" class="img-fluid img-max border">
                                @else
                                    <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')"
                                        class="img-fluid img-max border">
                                @endif
                                <hr class="my-1">
                                @if ($obj->image_en)
                                    <img src="{{ Storage::disk('local')->url('sm/' . $obj->image_en) }}"
                                        alt="{{ $obj->image_en }}" class="img-fluid img-max border">
                                @else
                                    <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')"
                                        class="img-fluid img-max border">
                                @endif
                            </td>
                            <td>
                                <div class="mb-1">
                                    TM -
                                    {!! $obj->title_tm !!}
                                </div>
                                <div class="mb-1">
                                    RU -
                                    {!! $obj->title_ru !!}
                                </div>
                                <div class="">
                                    EN -
                                    {!! $obj->title_en !!}
                                </div>
                            </td>
                            <td>{!! $obj->url !!}</td>
                            <td>{!! $obj->type == 'bottom' ? 'Aşaky' : 'Çep' !!}</td>
                            <td>{!! date('Y-m-d', strtotime($obj->date_start)) !!}</td>
                            <td>{!! date('Y-m-d', strtotime($obj->date_end)) !!}</td>
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
                                                href="{{ route('admin.smallSlider.edit', $obj->id) }}">
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
                                                    "{{ $obj->getTitle() }}" @lang('transAdmin.are-you-sure-want-to-delete')
                                                    <div class="mt-2 small">
                                                        <span class="text-danger font-weight-bold">@lang('transAdmin.be-carefully')</span>
                                                    </div>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-right">
                                                <form action="{{ route('admin.smallSlider.delete', $obj->id) }}"
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
                            <td colspan="8" class="text-center bg-light text-secondary">
                                <i class="fas fa-exclamation-circle"></i> @lang('transAdmin.slider') @lang('transAdmin.not-found')
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
