@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.posts')
@endsection
@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Täzelik üýtgetmek</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Täzelikler</a></li>
                <li class="breadcrumb-item active">Täzelik üýtgetmek</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.posts.update', $obj) }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    @include('admin.forms.text.edit', [
                                        'name' => 'title',
                                        'label' => trans('transAdmin.title'),
                                        'translations' => $obj->getTranslations('title'),
                                    ])

                                    @include('admin.forms.image.edit', [
                                        'resolution' => '???x???',
                                        'label' => 'Surat',
                                        'name' => 'image',
                                        'media' => 'posts',
                                    ])
                                    @include('admin.forms.datetime.edit')

                                </div>

                                <div class="col-md-6">
                                    @include('admin.forms.content.edit')

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
