@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.discount-days')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">

        <div class="justify-content-between align-items-center flex-wrap">
            <div class="float-left">
                <h4 class="mb-3 mb-md-0 ">Arzanladyş günlerini görmek</h4>
            </div>
            <div class="clearfix mb-3"></div>
            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.discount-days.index') }}">Arzanladyş günleri</a>
                    </li>
                    <li class="breadcrumb-item active">Arzanladyş günlerini görmek</li>
                </ol>
            </nav>
        </div>

        <div>

            <a href="{{ route('admin.discount-days.edit', $obj->id) }}" class="btn btn-warning text-white mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-edit">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg> Üýtgetmek
            </a>

            <!-- Button trigger modal -->


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
                                "{{ $obj->getName() }}" @lang('transAdmin.are-you-sure-want-to-delete')
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-right">
                            <form action="{{ route('admin.discount-days.delete', $obj->id) }}" method="post">
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
            <div class="card shadow my-4">
                <div class="card-body p-0">
                    <table class="table  mb-0">
                        <tbody>
                            <tr>
                                <td class="text-secondary">@lang('transAdmin.name')</td>
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
                            </tr>
                            <tr>
                                <td class="text-secondary">@lang('transAdmin.datetime-start')</td>
                                <td>{!! date('Y-m-d H:i', strtotime($obj->datetime_start)) !!}</td>
                            </tr>
                            <tr>
                                <td class="text-secondary">@lang('transAdmin.datetime-end')</td>
                                <td>{!! date('Y-m-d H:i', strtotime($obj->datetime_end)) !!}</td>
                            </tr>
                            <tr>
                                <td class="text-secondary">@lang('transAdmin.discount-percent')</td>
                                <td class="text-danger">{!! $obj->percent !!} <small>%</small></td>
                            </tr>
                            <tr>
                                <td class="text-secondary">@lang('transAdmin.enable')</td>
                                <td>
                                    <span class="badge {{ $obj->status == 1 ? 'badge-info' : 'badge-danger' }} text-md">
                                        {{ $obj->status == 1 ? trans('transAdmin.enable') : trans('transAdmin.disable') }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
