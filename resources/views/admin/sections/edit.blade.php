@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.sections')
@endsection
@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Bölüm üýtgetmek</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.sections.edit') }}">@lang('transAdmin.sections')</a></li>
                <li class="breadcrumb-item active">Bölüm üýtgetmek</li>
            </ol>
        </nav>
    </div>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.sections.update', $obj->id) }}" method="post"
                        enctype="multipart/form-data">
                        {!! method_field('PUT') !!}
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-6">
                                @include('admin.forms.name.edit')
                                @include('admin.forms.slug.edit')
                                @include('admin.form-items.color-picker.edit')
                                @include('admin.forms.logo.edit')
                                @include('admin.form-items.order.edit')

                            </div>
                            <div class="col-md-6">
                                @include('admin.forms.description.edit')
                            </div>
                            @include('admin.forms.buttons.edit')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
