@extends('admin.layouts.app')

@section('content')
    <div class="justify-content-between align-items-center flex-wrap">
        <div class="float-left">
            <h4 class="mb-3 mb-md-0 ">Ýakany üýtgetmek</h4>
        </div>
        <div class="clearfix mb-3"></div>
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('collars.index') }}">Ýakalar</a></li>
                <li class="breadcrumb-item active">Üýtgetmek</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('collars.update', $collar) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Ady</label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            name="name" value="{{ old('name', $collar->name) }}" id="name">
                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Düşündirişi
                                            <span class="required">*</span></label>
                                        <textarea type="text" rows="10" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                            name="description" id="description">{{ old('description', $collar->description) }}</textarea>
                                        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="machine_name">Tikin maşyn
                                        </label>
                                        <input type="text"
                                            class="form-control {{ $errors->has('machine_name') ? 'is-invalid' : '' }}"
                                            name="machine_name" value="{{ old('machine_name', $collar->machine_name) }}"
                                            id="machine_name">
                                        <div class="invalid-feedback">{{ $errors->first('machine_name') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="order">Tertibi</label>
                                        <input type="number"
                                            class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}"
                                            name="order" min="0" value="{{ old('order', $collar->order) }}"
                                            id="order">
                                        <div class="invalid-feedback">{{ $errors->first('order') }}</div>
                                    </div>

                                    <div class="form-group ">

                                        {{-- category input start --}}
                                        <div class="pb-2">
                                            <label for="categories">Kategoriýasy<span class="required">*</span></label>
                                            <select name="category_id" id="category_id"
                                                class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == old('category_id', $collar->category_id) ? 'selected' : '' }}>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Bahasy <span class="required">*</span></label>
                                        <input type="text" placeholder="0.00"
                                            class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                            name="price" value="{{ old('price', price_format($collar->price)) }}"
                                            id="price">
                                        <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                                    </div>

                                    <div class="form-check">
                                        <label class="form-check-label d-inline-block">
                                            <input type="checkbox" name="active" class="form-check-input" value="1"
                                                {{ old('active', $collar->active) ? 'checked' : '' }}>
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


                                    <div class="form-group">
                                        <label for="files">Faýlar <span class="required">*</span></label>
                                        <input type="file"
                                            class="form-control  {{ $errors->has('files') ? 'is-invalid' : '' }}" multiple
                                            name="files[]" value="{{ old('files') }}" id="files">
                                        <div class="invalid-feedback">{{ $errors->first('files') }}</div>
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
