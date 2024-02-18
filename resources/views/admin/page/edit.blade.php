@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.pages')
@endsection
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/summernote-bs4.css') }}" />
    <script type="text/javascript" src="{{ asset('js/summernote-bs4.js') }}"></script>

    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}" /> --}}

    @push('js')
        <script>
            $(document).ready(function() {
                $('.select2').select2({});
            });
        </script>
    @endpush



    <div class="d-flex flex-column ">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Sahypa goşmak</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Sahypalar</a></li>
                <li class="breadcrumb-item active">Sahypa goşmak</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <form action="{{ route('admin.pages.update', $obj->id) }}" method="post">
                    {!! method_field('PUT') !!}
                    {!! csrf_field() !!}

                    <div class="row">
                        <div class="col-md-6">
                            @include('admin.form-items.category.edit')


                            @include('admin.form-items.body.edit.tm')
                            @include('admin.form-items.body.edit.ru')
                            @include('admin.form-items.body.edit.en')
                            @include('admin.form-items.date_start.edit')

                            @include('admin.form-items.status.edit')

                        </div>
                    </div>

                    {{-- submit button --}}
                    <button type="submit" class="btn btn-primary mr-2">Üýtgetmek</button>

                </form>
            </div>
        </div>
    </div>


    <style>
        .note-group-select-from-files {
            display: none;
        }
    </style>
@endsection
