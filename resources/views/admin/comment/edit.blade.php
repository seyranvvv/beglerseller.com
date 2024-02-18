@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.brands')
@endsection
@section('content')
    <div class="d-flex flex-column ">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Kommentaria uytgetmek</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.comments.index') }}">Kommentarialar</a></li>
                <li class="breadcrumb-item active">Kommentaria uytgetmek</li>
            </ol>
        </nav>
    </div>

    <div class="my-4">
        <form action="{{ route('admin.comments.update', $obj->id) }}" method="post">
            {!! method_field('PUT') !!}
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-6">
                    <div class=" form-group">
                        <label for="name" class=" col-form-label text-md-right">
                            <span style="font-weight: bold !important">
                                @lang('transAdmin.customer'):
                            </span>{{ $obj->customer->name }}
                        </label>
                        <div class="d-flex flex-column justify-content-center">
                            <div></div>
                        </div>
                    </div>

                    <div class=" form-group">
                        <label for="name" class=" col-form-label text-md-right">
                            <span style="font-weight: bold !important">
                                @lang('transAdmin.body'):
                            </span> {{ $obj->body }}
                        </label>
                        <div class=" d-flex flex-column justify-content-center">
                            <div></div>
                        </div>
                    </div>




                    @include('admin.form-items.status.edit')
                    @include('admin.form-items.home_page.edit')


                </div>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Üýtgetmek</button>



        </form>
    </div>
@endsection
