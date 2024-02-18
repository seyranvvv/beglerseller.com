@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.categories')
@endsection
@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Kategoriýa goşmak</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.parent-categories.index') }}">Kategoriýalar</a></li>
                <li class="breadcrumb-item active">Kategoriýa goşmak</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.parent-categories.store') }}" method="post"
                            enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="row">
                                <div class="col-md-6">
                                    @include('admin.forms.text.create', [
                                        'name' => 'name',
                                        'label' => trans('transAdmin.name'),
                                    ])
                                    @include('admin.form-items.order.create')

                                </div>


                                <div class="col-12">
                                    @include('admin.forms.buttons.save')
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
