@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.brands')
@endsection
@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Acar üýtgetmek</h4>
        </div>
        <div class="clearfix mb-3"></div>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.password.update', $obj) }}" method="post"
                            enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">

                                    @include('admin.forms.password.edit',[
                                        'name' => 'old_password',
                                        'label' => 'Öňki açar söz'
                                    ])
                                    @include('admin.forms.password.edit',[
                                        'name' => 'password',
                                        'label' => 'Acar soz'
                                    ])
                                    @include('admin.forms.password.edit',[
                                        'name' => 'password_confirmation',
                                        'label' => 'Acar soz tassykla'
                                    ])
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
