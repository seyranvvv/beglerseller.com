@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.videos')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-3">@lang('transAdmin.videos')</div>
        <a href="{{ route('admin.videos.create') }}" class="btn btn-primary">
            + @lang('transAdmin.video')
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>@lang('transAdmin.video')</th>
                        <th>@lang('transAdmin.title')</th>
                        <th>@lang('transAdmin.date-start')</th>
                        <th>@lang('transAdmin.viewed')</th>
                        <th>@lang('transAdmin.enable')</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($objs as $obj)
                        <tr>
                            <td>
                                @if ($obj->image)
                                    <img src="{{ Storage::disk('local')->url('sm/' . $obj->image) }}"
                                        alt="{{ $obj->image }}" class="img-fluid  w-auto h-100 rounded-0  img-max border">
                                @else
                                    <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')"
                                        class="img-fluid  w-auto h-100 rounded-0  img-max border">
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
                            <td>{!! date('Y-m-d', strtotime($obj->date_start)) !!}</td>
                            <td>
                                {!! $obj->viewed !!} <span class="small text-secondary">@lang('transAdmin.viewed')</span>
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
                                                href="{{ route('admin.videos.edit', $obj->id) }}">
                                                <i data-feather="edit" class=" icon-sm mr-2"></i>
                                                <span class="">Üýtgetmek</span>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center"
                                                href="{{ route('admin.videos.refresh', $obj->id) }}">
                                                <i data-feather="refresh-ccw" class=" icon-sm mr-2"></i>
                                                <span class="">Täzelemek</span>
                                            </a>



                                            <a href="#" class="dropdown-item d-flex align-items-center"
                                                data-target="#d{{ $obj->id }}" data-toggle="modal">
                                                <i data-feather="trash" class=" icon-sm mr-2"></i>
                                                <span class="">Pozmak</span>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                {{-- <a href="{{ route('admin.videos.show', $obj->id) }}"
                                    class="btn btn-outline-primary btn-sm mb-1">
                                    <i class="fas fa-chart-bar"></i>
                                </a> --}}

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
                                                <form action="{{ route('admin.videos.delete', $obj->id) }}" method="post">
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
                                <i class="fas fa-exclamation-circle"></i> @lang('transAdmin.video') @lang('transAdmin.not-found')
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
