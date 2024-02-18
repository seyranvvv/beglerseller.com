@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.options')
@endsection
@section('content')
    <div class="float-left">
        <h4 class="mb-3 mb-md-0 ">Aýratynlyklar</h4>
    </div>
    <div class="clearfix mb-3"></div>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.options.index') }}">Aýratynlyklar</a></li>
            <li class="breadcrumb-item active">Täze görnüş goşmak</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <form action="{{ route('admin.options.values.store', $obj->id) }}" method="post">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-6">

                            @include('admin.form-items.name.create.tm')
                            @include('admin.form-items.name.create.ru')
                            @include('admin.form-items.name.create.en')

                            @include('admin.form-items.sort_order.create')

                            @include('admin.form-items.status.create')

                        </div>
                    </div>

                    {{-- submit button --}}
                    <button type="submit" class="btn btn-primary mr-2">Goş</button>

                </form>
            </div>
        </div>
    </div>
@endsection
