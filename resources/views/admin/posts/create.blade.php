@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.posts')
@endsection
@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Täzelik goşmak</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Täzelikler </a></li>
                <li class="breadcrumb-item active">Täzelik goşmak</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="row">
                                <div class="col-md-6">
                                    @include('admin.forms.text.create', [
                                        'name' => 'title',
                                        'label' => trans('transAdmin.title'),
                                    ])

                                    @include('admin.forms.image.create', [
                                        'resolution' => '???x???',
                                        'label' => 'Surat',
                                        'name' => 'image',
                                    ])
                                    @include('admin.forms.datetime.create')

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
