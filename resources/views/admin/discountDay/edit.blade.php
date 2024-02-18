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
            <li class="breadcrumb-item active">Arzanladyş gününi üýtgetmek</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <form action="{{ route('admin.discount-days.update', $obj->id) }}" method="post">
                    {!! method_field('PUT') !!}
                    {!! csrf_field() !!}



                    {{-- submit button --}}
                    <div class="row">
                        <div class="col-md-6">

                            @include('admin.form-items.name.edit.tm')
                            @include('admin.form-items.name.edit.ru')
                            @include('admin.form-items.name.edit.en')
                            @include('admin.form-items.datetime_start.edit')
                            @include('admin.form-items.datetime_end.edit')

                            @include('admin.form-items.percent.edit')
                            @include('admin.form-items.status.edit')

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Üýtget</button>


                </form>
            </div>
        </div>
    </div>
@endsection
