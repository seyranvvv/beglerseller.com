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
            <li class="breadcrumb-item active">Görnüş üýtgetmek goşmak</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <form action="{{ route('admin.options.values.update', $obj->id) }}" method="post">
                    {!! method_field('PUT') !!}
                    {!! csrf_field() !!}

                    <div class="row">
                        <div class="col-md-6">

                            @include('admin.form-items.name.edit.tm')
                            @include('admin.form-items.name.edit.ru')
                            @include('admin.form-items.name.edit.en')

                            @include('admin.form-items.sort_order.edit')

                            @include('admin.form-items.status.edit')

                        </div>
                    </div>

                    {{-- submit button --}}
                    <button type="submit" class="btn btn-primary mr-2">Üýtgetmek</button>

                </form>
            </div>
        </div>
    </div>
@endsection
