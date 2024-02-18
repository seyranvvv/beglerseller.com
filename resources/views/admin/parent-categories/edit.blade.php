@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.categories')
@endsection
@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Kategoriýany üýtgetmek</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.parent-categories.index') }}">Kategoriýalar</a></li>
                <li class="breadcrumb-item active">Kategoriýany üýtgetmek</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.parent-categories.update', ['parent_category' => $obj]) }}"
                            method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    @include('admin.forms.text.edit', [
                                        'name' => 'name',
                                        'label' => trans('transAdmin.name'),
                                        'translations' => $obj->getTranslations('name'),
                                    ])
                                    @include('admin.form-items.order.edit')
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
