@extends('dashboard::layouts.master')
@section('content')
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <form method="POST" action="{{ route('menu.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-7 col-12">
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
                                        <label for="title">Name <span class="error">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name"
                                               value="{{ old('name') }}" placeholder="Menu Name" required/>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="title">Description</label>
                                        <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary form-control mr-1">{{ __('Create Menu') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
