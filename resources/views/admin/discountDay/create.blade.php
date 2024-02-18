@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.discount-days')
@endsection
@section('content')
    <div class="float-left">
        <h4 class="mb-3 mb-md-0 ">Arzanladyş günleri</h4>
    </div>
    <div class="clearfix mb-3"></div>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.discount-days.index') }}">Arzanladyş günleri</a></li>
            <li class="breadcrumb-item active">Täze arzanladyş günleri goşmak</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <form action="{{ route('admin.discount-days.store') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-6">
                            @include('admin.form-items.name.create.tm')
                            @include('admin.form-items.name.create.ru')
                            @include('admin.form-items.name.create.en')
                            @include('admin.form-items.datetime_start.create')
                            @include('admin.form-items.datetime_end.create')

                            @include('admin.form-items.percent.create')
                            @include('admin.form-items.status.create')


                            {{-- submit button --}}
                            <button type="submit" class="btn btn-primary mr-2">Goş</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
