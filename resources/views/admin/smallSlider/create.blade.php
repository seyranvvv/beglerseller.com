@extends('admin.layouts.app')
@section('title')
    @lang('transAdmin.sliders')
@endsection
@section('content')
    @push('js')
        <script>
            $(document).ready(function() {
                $('.select2').select2({

                });
            });
        </script>
    @endpush
    <div class="d-flex flex-column ">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Taze slider goşmak</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Sliderler</a></li>
                <li class="breadcrumb-item active">Taze slider goşmak</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="my-4">
                <form action="{{ route('admin.smallSlider.store') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-6">
                            @include('admin.form-items.title.create.tm')
                            @include('admin.form-items.title.create.ru')
                            @include('admin.form-items.title.create.en')

                            @include('admin.form-items.url.create')



                            @include('admin.form-items.date_start.create')
                            @include('admin.form-items.date_end.create')
                            @include('admin.form-items.type.create')


                            @include('admin.form-items.image.smallSlider.create.tm')
                            @include('admin.form-items.image.smallSlider.create.ru')
                            @include('admin.form-items.image.smallSlider.create.en')

                            @include('admin.form-items.status.create')
                        </div>
                    </div>

                    {{-- submit button --}}
                    <button type="submit" class="btn btn-primary mr-2">Goş</button>

                </form>
            </div>
        </div>
    </div>
@endsection
