@extends('dashboard::layouts.master')
@section('content')
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add new category</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Name <span class="error">*</span></label>
                                        <input type="text" id="first-name-vertical" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Description</label>
                                        <textarea id="email-id-vertical" class="form-control" name="description" placeholder="Description">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
