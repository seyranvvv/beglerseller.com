@extends('admin.layouts.app')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-3">Kurs $</div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>$ Kurs</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($objs as $obj)
                        <tr>
                            <td>
                                <div class="mb-1">
                                    {!! $obj->id !!}
                                </div>
                            </td>
                            <td>
                                <div class="mb-1">
                                    $ {!! $obj->course !!}
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.exchange.edit', $obj->id) }}"
                                    class="btn btn-outline-success btn-sm mb-1">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center bg-light text-secondary">
                                <i class="fas fa-exclamation-circle"></i> @lang('transFront.contact') @lang('transAdmin.not-found')
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
