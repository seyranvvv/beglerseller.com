@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.cards')
@endsection
@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Kartockany üýtgetmek</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.cards.index') }}">Kartockalar</a></li>
                <li class="breadcrumb-item active">Kartockany üýtgetmek</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.cards.update', $obj) }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    @include('admin.forms.cardType.edit')

                                    @include('admin.forms.name.edit')
                                    @include('admin.forms.image.edit', [
                                        'resolution' => 'icon',
                                        'label' => 'Ikonka',
                                        'name' => 'image',
                                        'media' => 'icon',
                                    ])
                                    @include('admin.forms.text.edit', [
                                        'name' => 'counter_text',
                                        'label' => 'Counter text',
                                        'translations' => $obj->getTranslations('counter_text'),
                                    ])

                                    @include('admin.forms.number.edit', [
                                        'name' => 'counter_number',
                                        'label' => 'Counter number',
                                        'value' => $obj->counter_number,
                                    ])

                                </div>

                                <div class="col-md-6">
                                    @include('admin.forms.body.edit')

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
