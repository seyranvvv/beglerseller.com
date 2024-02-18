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
                <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Kategoriýalar</a></li>
                <li class="breadcrumb-item active">Kategoriýa goşmak</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="row">
                                <div class="col-md-6">

                                    <div class=" form-group">
                                        <label for="parent_category_id">
                                            Bash kategoria
                                        </label>
                                        <div class=" ">
                                            <select id="parent_category_id"
                                                class="form-control select2 {{ $errors->has('parent_category_id') ? ' is-invalid' : '' }}"
                                                name="parent_category_id">

                                                @foreach ($parentCategories as $parent)
                                                    <option {{ $loop->first ? 'selected' : '' }}
                                                        value="{{ $parent->id }}">{{ $parent->name }}</option>
                                                @endforeach

                                            </select>
                                            @if ($errors->has('type'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('parent_category_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>



                                    @include('admin.forms.text.create', [
                                        'name' => 'name',
                                        'label' => trans('transAdmin.name'),
                                    ])
                                    @include('admin.form-items.order.create')

                                </div>

                                <div class="col-md-6">
                                    @include('admin.forms.image.create', [
                                        'resolution' => '???x???',
                                        'label' => 'Surat',
                                        'name' => 'image',
                                    ])
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
