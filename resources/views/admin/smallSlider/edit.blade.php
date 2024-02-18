@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.sliders')
@endsection
@section('content')
    <div class="d-flex flex-column ">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Slider üýtgetmek</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Sliderler</a></li>
                <li class="breadcrumb-item active">Slider üýtgetmek</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <form action="{{ route('admin.smallSlider.update', $obj->id) }}" method="post"
                    enctype="multipart/form-data">
                    {!! method_field('PUT') !!}
                    {!! csrf_field() !!}

                    <div class="row">
                        <div class="col-md-6">
                            @include('admin.form-items.title.edit.tm')
                            @include('admin.form-items.title.edit.ru')
                            @include('admin.form-items.title.edit.en')


                            @include('admin.form-items.url.edit')

                            @include('admin.form-items.date_start.edit')
                            @include('admin.form-items.date_end.edit')

                            @include('admin.form-items.image.smallSlider.edit.tm')
                            @include('admin.form-items.image.smallSlider.edit.ru')
                            @include('admin.form-items.image.smallSlider.edit.en')

                            @include('admin.form-items.status.edit')

                            {{-- submit button --}}
                            <button type="submit" class="btn btn-primary mr-2">Üýtget</button>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
