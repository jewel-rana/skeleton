@extends('dashboard::layouts.master')
@section('content')
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-9 col-12">
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
                                               value="{{ old('title') }}" placeholder="Menu Name" required/>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="title">Menu Icon</label>
                                        <input type="file" name="logo" class="form-control-file" placeholder="Choose Icon">
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>




                </div>
                <div class="col-md-3 col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-primary form-control mr-1">{{ __('Create Menu') }}</button>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </form>
    </section>
@endsection
@section('header')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/admin/css/vendors/css/forms/wizard/bs-stepper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/plugins/forms/form-wizard.css') }}">
@endsection
@section('footer')
    <script src="{{ asset('assets/admin/js/vendors/js/forms/wizard/bs-stepper.min.j') }}s"></script>
    <script src="{{ asset('assets/admin/js/scripts/forms/form-wizard.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/idal2zwhxlnk67o4lcz5xb5csdu88xw9f1delibgnh1gihmh/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>
@endsection
