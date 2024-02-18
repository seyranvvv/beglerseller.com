@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.posts')
@endsection
@section('content')
    @push('js')
        <script>
            $(document).ready(function() {
                $('.select2').select2({});
            });
        </script>
    @endpush


    <div class="d-flex flex-column ">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Täzelikler </h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Täzelikler</a></li>
                <li class="breadcrumb-item active">Täzelik üýtgetmek</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <form action="{{ route('admin.posts.update', $obj->id) }}" method="post" enctype="multipart/form-data">
                    {!! method_field('PUT') !!}
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-6">
                            @include('admin.form-items.category.edit')
                            @include('admin.form-items.title.edit.tm')
                            @include('admin.form-items.title.edit.ru')
                            @include('admin.form-items.title.edit.en')
                            @include('admin.form-items.url.edit')
                            @include('admin.form-items.image.edit.post')
                            @include('admin.form-items.date_start.edit')
                            @include('admin.form-items.status.edit')
                        </div>
                        <div class="col-md-6">
                            @include('admin.form-items.body.edit.tm')
                            @include('admin.form-items.body.edit.ru')
                            @include('admin.form-items.body.edit.en')
                        </div>
                    </div>



                    {{-- submit button --}}
                    <div class=" form-group mb-0">
                        <button type="submit" class="btn btn-primary mr-2">Üýtgetmek</button>

                </form>
            </div>
        </div>

        <style>
            .note-group-select-from-files {
                display: none;
            }
        </style>
    @endsection
