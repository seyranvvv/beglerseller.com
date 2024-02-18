@extends('admin.layouts.app')

@section('content')
    <div class="justify-content-center align-items-center flex-wrap h-100">

        <div class="row h-100">
            <div class="col-md-12 grid-margin stretch-card h-100">
                <div class="card">
                    <div class="card-body d-flex flex-column justify-content-top">
                        <div class="row">
                            @foreach ($counts as $count)
                                <div class="col-4 my-3">
                                    <div class="card border-left-{!! $count['color'] !!} shadow h-100">
                                        <div class="card-body p-3">
                                            <div class="h5 font-weight-bold text-{!! $count['color'] !!} text-uppercase">
                                                {!! $count['name'] !!}</div>
                                            <div class="h3 mb-0 font-weight-bold">{!! $count['count'] !!}</div>
                                            <div class="text-right">
                                                <i
                                                    class="fas fa-{!! $count['icon'] !!} fa-3x text-{!! $count['color'] !!}"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
