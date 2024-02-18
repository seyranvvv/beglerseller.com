@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.pages')
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
                <form action="{{ route('admin.pages.store') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-6">
                            @include('admin.form-items.category.create')


                            @include('admin.form-items.body.create.tm')
                            @include('admin.form-items.body.create.ru')
                            @include('admin.form-items.body.create.en')
                            @include('admin.form-items.date_start.create')

                            @include('admin.form-items.status.create')

                        </div>
                    </div>

                    {{-- submit button --}}
                    <button type="submit" class="btn btn-primary mr-2">Goş</button>

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
