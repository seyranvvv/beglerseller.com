@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.abouts')
@endsection
@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Biz baradany üýtgetmek</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.abouts.index') }}">Biz baradalar</a></li>
                <li class="breadcrumb-item active">Biz baradany üýtgetmek</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.abouts.update', $obj) }}" method="post"
                            enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    @include('admin.forms.title.edit')
                                    @include('admin.forms.years.edit')
                                    @include('admin.forms.image.edit', [
                                        'resolution' => '365x350',
                                        'label' => 'bash sahypa 1nji surat',
                                        'name' => 'image',
                                        'media' => 'about',
                                    ])
                                    @include('admin.forms.image.edit', [
                                        'resolution' => '540x490',
                                        'label' => 'bash sahypa 2nji surat',
                                        'name' => 'image2',
                                        'media' => 'about2',
                                    ])

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
