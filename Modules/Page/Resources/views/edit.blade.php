@extends('dashboard::layouts.master')
@section('content')
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">


            <form method="POST" action="{{ route('page.update', $page->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

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
                                        <label for="title">Title <span class="error">*</span></label>
                                        <input type="text" id="title" class="form-control" name="title"
                                               value="{{ old('title', $page->title) }}" placeholder="Page title" required/>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Description</label>
                                        <textarea id="email-id-vertical" class="form-control" rows="10"
                                                  name="description"
                                                  placeholder="Description">{{ old('description', $page->description) }}</textarea>
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
                                <label for="status">Publish status</label>
                                <select id="status" class="form-control" name="status">
                                    <option value="{{ \App\Constants\AppConst::PRODUCT_PUBLISH }}" @if(old('status', $page->status) === \App\Constants\AppConst::PRODUCT_PUBLISH) selected @endif>Publish</option>
                                    <option value="{{ \App\Constants\AppConst::PRODUCT_DRAFT }}" @if(old('status', $page->status) === \App\Constants\AppConst::PRODUCT_DRAFT) selected @endif>Draft</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="category_id">{{ __('Template') }}</label>
                                <select id="category_id" class="form-control" name="template">
                                    <option value="">{{ __('Select Template') }}</option>

                                    @foreach($templates as $template)
                                        <option value="" @if(old('template', $page->template) == $template) selected @endif>{{$template}}</option>
                                    @endforeach



                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-primary form-control mr-1">{{ __('Create Page') }}</button>
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
