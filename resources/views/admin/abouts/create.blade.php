@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.abouts')
@endsection
@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Täze Biz Barada goşmak</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.abouts.index') }}">Biz Baradalar</a></li>
                <li class="breadcrumb-item active">Biz Barada goşmak</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.abouts.store') }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="row">
                                <div class="col-md-6">
                                    @include('admin.forms.title.create')
                                    @include('admin.forms.years.create')
                                    @include('admin.forms.image.create', [
                                        'resolution' => '365x350',
                                        'label' => 'bash sahypa 1nji surat',
                                        'name' => 'image',
                                    ])
                                    @include('admin.forms.image.create', [
                                        'resolution' => '540x490',
                                        'label' => 'bash sahypa 2nji surat',
                                        'name' => 'image2',
                                    ])

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
