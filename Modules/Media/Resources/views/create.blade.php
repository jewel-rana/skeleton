@extends('dashboard::layouts.master')
@section('content')
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('media.store') }}" method="POST" class="dropzone dropzone-area" id="dpz-remove-thumb">
                            @csrf
                            <div class="dz-message">Drop files here or click to upload.</div>
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/plugins/forms/form-file-uploader.css') }}">
@endsection

@section('footer')
    <script src="{{ asset('assets/admin/js/vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scripts/forms/form-file-uploader.js') }}"></script>
@endsection
