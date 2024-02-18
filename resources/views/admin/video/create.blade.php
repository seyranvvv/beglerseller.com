@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.videos')
@endsection
@section('content')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}" /> --}}

    @push('js')
        <script>
            $(document).ready(function() {
                $('.select2').select2({

                });
            });
        </script>
    @endpush

    <div class="d-flex flex-column ">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Wideo goşmak</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.videos.index') }}">Wideolar</a></li>
                <li class="breadcrumb-item active">Wideo goşmak</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <form action="{{ route('admin.videos.store') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-6">
                            @include('admin.form-items.category.create')

                            @include('admin.form-items.title.create.tm')
                            @include('admin.form-items.title.create.ru')
                            @include('admin.form-items.title.create.en')
                            @include('admin.form-items.url.create')
                            @include('admin.form-items.date_start.create')
                            @include('admin.form-items.status.create')

                        </div>
                        <div class="col-md-6">
                            @include('admin.form-items.image.create.video')
                            @include('admin.form-items.video.create')
                        </div>
                    </div>

                    {{-- submit button --}}
                    <button type="submit" class="btn btn-primary mr-2">Goş</button>

                </form>
            </div>
        </div>
    </div>
@endsection
