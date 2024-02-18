@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.cards')
@endsection
@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Täze Kartoçka goşmak</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.cards.index') }}">Kartoçkalar</a></li>
                <li class="breadcrumb-item active">Kartoçka goşmak</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.cards.store') }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="row">
                                <div class="col-md-6">
                                    @include('admin.forms.cardType.create')

                                    @include('admin.forms.name.create')
                                    @include('admin.forms.image.create', [
                                        'resolution' => 'icon',
                                        'label' => 'Ikonka',
                                        'name' => 'image',
                                    ])
                                    @include('admin.forms.text.create', [
                                        'name' => 'counter_text',
                                        'label' => 'Counter text',
                                    ])

                                    @include('admin.forms.number.create', [
                                        'name' => 'counter_number',
                                        'label' => 'Counter number',
                                    ])

                                    {{-- TODO: asakyny etmeli --}}
                                    {{-- @include('admin.forms.type.create') --}}
                                </div>

                                <div class="col-md-6">
                                    @include('admin.forms.body.create')

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
