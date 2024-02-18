@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.orders')
@endsection
@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Sargytlar</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.orders.show', $obj->id) }}"> {!! $obj->getName() !!}</a>
                </li>
                <li class="breadcrumb-item active">Yzarlama goşmak</li>
            </ol>
        </nav>
    </div>



    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <form action="{{ route('admin.orders.track.store', $obj->id) }}" method="post">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class=" form-group">
                                <label for="track" class=" col-form-label text-md-right">
                                    @lang('transAdmin.track') <span class="text-danger">*</span>
                                </label>
                                <div class="">
                                    <input id="track" type="text"
                                        class="form-control{{ $errors->has('track') ? ' is-invalid' : '' }}" name="track"
                                        value="{{ $track->getName() }}" readonly required>
                                    @if ($errors->has('track'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('track') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class=" form-group">
                                <label for="note" class=" col-form-label text-md-right">
                                    @lang('transAdmin.note')
                                </label>
                                <div class="">
                                    <textarea id="note" class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}" name="note"
                                        rows="3" autofocus>{{ old('note') }}</textarea>
                                    @if ($errors->has('note'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('note') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class=" form-group">
                                <label for="f_note" class=" col-form-label text-md-right">
                                    <i class="fas fa-bell"></i> @lang('transAdmin.announcement')
                                </label>
                                <div class="">
                                    <textarea id="f_note" class="form-control{{ $errors->has('f_note') ? ' is-invalid' : '' }}" name="f_note"
                                        rows="3" autofocus>{{ old('f_note') }}</textarea>
                                    @if ($errors->has('f_note'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('f_note') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- submit button --}}
                    <button type="submit" class="btn btn-primary mr-2">Goş</button>

                </form>
            </div>
        </div>
    </div>
@endsection
