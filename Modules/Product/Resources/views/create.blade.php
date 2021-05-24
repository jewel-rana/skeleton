@extends('dashboard::layouts.master')
@section('content')
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('product.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="title">Title <span class="error">*</span></label>
                                            <input type="text" id="title" class="form-control" name="title"
                                                   value="{{ old('title') }}" placeholder="Product title" required/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email-id-vertical">Description</label>
                                            <textarea id="email-id-vertical" class="form-control" name="description"
                                                      value="{{ old('description') }}"
                                                      placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="price">Description</label>
                                            <input type="number" id="price" class="form-control" name="price"
                                                   value="{{ old('price') }}" placeholder="Price" required/>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select id="category_id" class="form-control" name="category_id">
                                    <option value="">{{ __('Select category') }}</option>
                                    @foreach($category_lists as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Product photo</label>
                                <input type="file" name="photo" class="form-control-file" placeholder="Choose photo">
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mr-1">{{ __('Create product') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
