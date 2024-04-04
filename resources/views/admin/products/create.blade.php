@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.products')
@endsection
@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Täze Haryt goşmak</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Harytlar</a></li>
                <li class="breadcrumb-item active">Haryt goşmak</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="row">
                                <div class="col-md-6">
                                    @include('admin.forms.categories.create')

                                    @include('admin.forms.text.create', [
                                        'name' => 'title',
                                        'label' => trans('transAdmin.title'),
                                    ])
                                    @include('admin.forms.price.create', [
                                        'name' => 'price',
                                        'label' => trans('transAdmin.price'),
                                    ])

                                    @include('admin.forms.image.create', [
                                        'resolution' => '270x320',
                                        'label' => 'Surat 1',
                                        'name' => 'image_1',
                                        'media' => 'products',
                                    ])

                                    @for ($i = 2; $i < 6; $i++)
                                        @include('admin.forms.image.create', [
                                            'resolution' => '270x320',
                                            'label' => 'Surat ' . $i,
                                            'name' => 'image_' . $i,
                                            'media' => 'products_' . $i,
                                        ])
                                    @endfor




                                </div>

                                <div class="col-md-6">
                                    @include('admin.forms.content.create')

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
