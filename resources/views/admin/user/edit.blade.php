@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.users')
@endsection
@section('content')
    <div class="d-flex flex-column ">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Ulanyjy üýtgetmek</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Ulanyjylar</a></li>
                <li class="breadcrumb-item active">Ulanyjy üýtgetmek</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <form action="{{ route('admin.users.update', $obj->id) }}" method="post">
                    {!! method_field('PUT') !!}
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class=" form-group">
                                <label for="name" class="col-form-label text-md-right">
                                    @lang('transAdmin.full-name') <span class="text-danger">*</span>
                                </label>
                                <div class="">
                                    <input id="name" type="text"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                        value="{{ $obj->name }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class=" form-group">
                                <label for="username" class=" col-form-label text-md-right">
                                    @lang('transAdmin.username') <span class="text-danger">*</span>
                                </label>
                                <div class="">
                                    <input id="username" type="text"
                                        class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                        name="username" value="{{ $obj->username }}" required>
                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            @include('admin.form-items.status.edit')

                            <hr>

                            <div class=" form-group">
                                <div class="">
                                    <div class="row">
                                        @foreach ($permissions as $permission)
                                            <div class="col-6">
                                                <div class="form-check">
                                                    <label class="form-check-label  d-inline-block"
                                                        for="{{ $permission->id }}">
                                                        <input type="checkbox" class="custom-control-input"
                                                            {{ $obj->permissions->contains($permission) ? 'checked' : '' }}
                                                            id="{{ $permission->id }}" name="permissions[]"
                                                            value="{{ $permission->id }}">
                                                        {{ $permission->getName() }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @if ($errors->has('permissions'))
                                    <div class="col-12">
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('permissions') }}</strong>
                                        </span>
                                    </div>
                                @endif
                            </div>

                            {{-- submit button --}}
                            <div class=" form-group mb-0">
                                <div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> @lang('transAdmin.save')
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
