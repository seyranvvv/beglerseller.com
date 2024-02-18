@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.brands')
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h4 mb-3">
            <a href="{{ route('admin.brands.index') }}">
                <i class="fas fa-caret-left"></i> @lang('transAdmin.brands')
            </a>
            <span class="text-gray-500">/</span>
            @lang('transAdmin.show')
        </div>

        <div>
            <a href="{{ route('admin.brands.edit', $obj->id) }}" class="btn btn-outline-success btn-sm mb-1">
                <i class="fas fa-pen"></i>
            </a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-dark btn-sm mb-1" data-toggle="modal"
                data-target="#d{{ $obj->id }}">
                <i class="fas fa-trash-alt"></i>
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
                                        {!! $obj->sets_count !!} @lang('transAdmin.product')
                                        @lang('transAdmin.will-be-deleted')
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-right">
                            <form action="{{ route('admin.brands.delete', $obj->id) }}" method="post">
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

    <div class="card shadow my-4">
        <div class="card-body p-0">
            <table class="table  mb-0">
                <tbody>
                    <tr>
                        <td class="text-secondary">@lang('transAdmin.name')</td>
                        <td>
                            {!! $obj->getName() !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-secondary">@lang('transAdmin.products')</td>
                        <td>
                            <i class="fas fa-th text-success"></i> {!! $obj->sets_count !!}
                        </td>
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
@endsection
