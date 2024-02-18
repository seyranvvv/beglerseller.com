@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.sliders')
@endsection
@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Slideri üýtgetmek</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Sliderlar</a></li>
                <li class="breadcrumb-item active">Slideri üýtgetmek</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.sliders.update', $obj) }}" method="post"
                            enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    @include('admin.forms.title.edit')
                                    @include('admin.forms.body.edit')
                                    @include('admin.forms.url.edit')
                                    @include('admin.form-items.status.edit')
                                </div>

                                <div class="col-md-6">
                                    @include('admin.forms.images.edit', ['resolution' => '1290x680'])
                                </div>
                                <div class="col-12">
                                    @include('admin.forms.buttons.edit')
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
