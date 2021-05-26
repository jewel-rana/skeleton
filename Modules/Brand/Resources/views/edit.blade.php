@extends('dashboard::layouts.master')
@section('content')
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <form class="form form-vertical" action="{{ route('brand.update', $brand->id) }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Name <span class="error">*</span></label>
                                        <input type="text" id="first-name-vertical" class="form-control" name="name"
                                               value="{{ old('name', $brand->name) }}" placeholder="Name" required/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Description</label>
                                        <textarea id="email-id-vertical" class="form-control" name="description"
                                                  placeholder="Description">{{ old('description', $brand->description) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="media">Upload logo</label>
                                <input type="file" name="attachment" multiple id="media" class="form-control-file" required/>
                            </div>
                            <img src=""/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
