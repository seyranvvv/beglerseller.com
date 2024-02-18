@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.contacts')
@endsection
@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Biz baradany üýtgetmek</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.contacts.index') }}">Biz baradalar</a></li>
                <li class="breadcrumb-item active">Biz baradany üýtgetmek</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.contacts.update', $obj) }}" method="post"
                            enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    @include('admin.forms.text.edit', [
                                        'name' => 'address',
                                        'label' => trans('transAdmin.address'),
                                        'translations' => $obj->getTranslations('address'),
                                    ])
                                    @include('admin.forms.text.edit', [
                                        'name' => 'slogan',
                                        'label' => trans('transAdmin.slogan'),
                                        'translations' => $obj->getTranslations('slogan'),
                                    ])


                                </div>

                                <div class="col-md-6">
                                    @include('admin.forms.phone.edit')

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
