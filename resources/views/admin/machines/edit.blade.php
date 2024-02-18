@extends('admin.layouts.app')

@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Tikin maşyny üýtgetmek</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('machines.index') }}">Tikin maşynlar</a></li>
                <li class="breadcrumb-item active">Üýtgetmek</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('machines.update', $machine) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Ady</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            name="name" value="{{ old('name', $machine->name) }}" id="name">
                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Düşündirişi
                                            <span class="required">*</span></label>
                                        <textarea type="text" rows="10" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                            name="description" id="description">{{ old('description', $machine->description) }}</textarea>
                                        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                                    </div>


                                    <div class="form-group">
                                        <label for="order">Tertibi</label>
                                        <input type="number"
                                            class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}"
                                            name="order" min="0" value="{{ old('order', $machine->order) }}"
                                            id="order">
                                        <div class="invalid-feedback">{{ $errors->first('order') }}</div>
                                    </div>



                                    <div class="form-group">
                                        <label for="price">Bahasy <span class="required">*</span></label>
                                        <input type="text" placeholder="0.00"
                                            class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                            name="price" value="{{ old('price', price_format($machine->price)) }}"
                                            id="price">
                                        <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                                    </div>

                                    <div class="form-check">
                                        <label class="form-check-label d-inline-block">
                                            <input type="checkbox" name="active" class="form-check-input" value="1"
                                                {{ old('active', $machine->active) ? 'checked' : '' }}>
                                            Görkezilýär
                                        </label>
                                    </div>


                                    <div class="form-group">
                                        <label for="images">Suratlar <span class="required">*</span></label>
                                        <input type="file"
                                            class="form-control  {{ $errors->has('images') ? 'is-invalid' : '' }}" multiple
                                            name="images[]" value="{{ old('images') }}" id="images">
                                        <div class="invalid-feedback">{{ $errors->first('images') }}</div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Üýtget</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('#category_id, #products').select2();
    </script>
@endpush
