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
                                               value="{{ old('title') }}" placeholder="Product title" required/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" id="slug" class="form-control" name="slug"
                                               value="{{ old('slug') }}" placeholder="product-page-url"/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Description</label>
                                        <textarea id="email-id-vertical" class="form-control" rows="10"
                                                  name="description"
                                                  placeholder="Description">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modern Vertical Wizard -->
                {{--                    <section class="modern-vertical-wizard">--}}
                {{--                        <div class="bs-stepper vertical wizard-modern modern-vertical-wizard-example">--}}
                {{--                            <div class="bs-stepper-header">--}}
                {{--                                <div class="step" data-target="#account-details-vertical-modern">--}}
                {{--                                    <button type="button" class="step-trigger">--}}
                {{--                                    <span class="bs-stepper-box">--}}
                {{--                                        <i data-feather="file-text" class="font-medium-3"></i>--}}
                {{--                                    </span>--}}
                {{--                                        <span class="bs-stepper-label">--}}
                {{--                                        <span class="bs-stepper-title">Account Details</span>--}}
                {{--                                        <span class="bs-stepper-subtitle">Setup Account Details</span>--}}
                {{--                                    </span>--}}
                {{--                                    </button>--}}
                {{--                                </div>--}}
                {{--                                <div class="step" data-target="#personal-info-vertical-modern">--}}
                {{--                                    <button type="button" class="step-trigger">--}}
                {{--                                    <span class="bs-stepper-box">--}}
                {{--                                        <i data-feather="user" class="font-medium-3"></i>--}}
                {{--                                    </span>--}}
                {{--                                        <span class="bs-stepper-label">--}}
                {{--                                        <span class="bs-stepper-title">Personal Info</span>--}}
                {{--                                        <span class="bs-stepper-subtitle">Add Personal Info</span>--}}
                {{--                                    </span>--}}
                {{--                                    </button>--}}
                {{--                                </div>--}}
                {{--                                <div class="step" data-target="#address-step-vertical-modern">--}}
                {{--                                    <button type="button" class="step-trigger">--}}
                {{--                                    <span class="bs-stepper-box">--}}
                {{--                                        <i data-feather="map-pin" class="font-medium-3"></i>--}}
                {{--                                    </span>--}}
                {{--                                        <span class="bs-stepper-label">--}}
                {{--                                        <span class="bs-stepper-title">Address</span>--}}
                {{--                                        <span class="bs-stepper-subtitle">Add Address</span>--}}
                {{--                                    </span>--}}
                {{--                                    </button>--}}
                {{--                                </div>--}}
                {{--                                <div class="step" data-target="#social-links-vertical-modern">--}}
                {{--                                    <button type="button" class="step-trigger">--}}
                {{--                                    <span class="bs-stepper-box">--}}
                {{--                                        <i data-feather="link" class="font-medium-3"></i>--}}
                {{--                                    </span>--}}
                {{--                                        <span class="bs-stepper-label">--}}
                {{--                                        <span class="bs-stepper-title">Social Links</span>--}}
                {{--                                        <span class="bs-stepper-subtitle">Add Social Links</span>--}}
                {{--                                    </span>--}}
                {{--                                    </button>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <div class="bs-stepper-content">--}}
                {{--                                <div id="account-details-vertical-modern" class="content">--}}
                {{--                                    <div class="content-header">--}}
                {{--                                        <h5 class="mb-0">Account Details</h5>--}}
                {{--                                        <small class="text-muted">Enter Your Account Details.</small>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="row">--}}
                {{--                                        <div class="form-group col-md-6">--}}
                {{--                                            <label class="form-label" for="vertical-modern-username">Username</label>--}}
                {{--                                            <input type="text" id="vertical-modern-username" class="form-control" placeholder="johndoe" />--}}
                {{--                                        </div>--}}
                {{--                                        <div class="form-group col-md-6">--}}
                {{--                                            <label class="form-label" for="vertical-modern-email">Email</label>--}}
                {{--                                            <input type="email" id="vertical-modern-email" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" />--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="row">--}}
                {{--                                        <div class="form-group form-password-toggle col-md-6">--}}
                {{--                                            <label class="form-label" for="vertical-modern-password">Password</label>--}}
                {{--                                            <input type="password" id="vertical-modern-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />--}}
                {{--                                        </div>--}}
                {{--                                        <div class="form-group form-password-toggle col-md-6">--}}
                {{--                                            <label class="form-label" for="vertical-modern-confirm-password">Confirm Password</label>--}}
                {{--                                            <input type="password" id="vertical-modern-confirm-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="d-flex justify-content-between">--}}
                {{--                                        <button class="btn btn-outline-secondary btn-prev" disabled>--}}
                {{--                                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>--}}
                {{--                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>--}}
                {{--                                        </button>--}}
                {{--                                        <button class="btn btn-primary btn-next">--}}
                {{--                                            <span class="align-middle d-sm-inline-block d-none">Next</span>--}}
                {{--                                            <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>--}}
                {{--                                        </button>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <div id="personal-info-vertical-modern" class="content">--}}
                {{--                                    <div class="content-header">--}}
                {{--                                        <h5 class="mb-0">Personal Info</h5>--}}
                {{--                                        <small>Enter Your Personal Info.</small>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="row">--}}
                {{--                                        <div class="form-group col-md-6">--}}
                {{--                                            <label class="form-label" for="vertical-modern-first-name">First Name</label>--}}
                {{--                                            <input type="text" id="vertical-modern-first-name" class="form-control" placeholder="John" />--}}
                {{--                                        </div>--}}
                {{--                                        <div class="form-group col-md-6">--}}
                {{--                                            <label class="form-label" for="vertical-modern-last-name">Last Name</label>--}}
                {{--                                            <input type="text" id="vertical-modern-last-name" class="form-control" placeholder="Doe" />--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="row">--}}
                {{--                                        <div class="form-group col-md-6">--}}
                {{--                                            <label class="form-label" for="vertical-modern-country">Country</label>--}}
                {{--                                            <select class="select2 w-100" id="vertical-modern-country">--}}
                {{--                                                <option label=" "></option>--}}
                {{--                                                <option>UK</option>--}}
                {{--                                                <option>USA</option>--}}
                {{--                                                <option>Spain</option>--}}
                {{--                                                <option>France</option>--}}
                {{--                                                <option>Italy</option>--}}
                {{--                                                <option>Australia</option>--}}
                {{--                                            </select>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="form-group col-md-6">--}}
                {{--                                            <label class="form-label" for="vertical-modern-language">Language</label>--}}
                {{--                                            <select class="select2 w-100" id="vertical-modern-language" multiple>--}}
                {{--                                                <option>English</option>--}}
                {{--                                                <option>French</option>--}}
                {{--                                                <option>Spanish</option>--}}
                {{--                                            </select>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="d-flex justify-content-between">--}}
                {{--                                        <button class="btn btn-primary btn-prev">--}}
                {{--                                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>--}}
                {{--                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>--}}
                {{--                                        </button>--}}
                {{--                                        <button class="btn btn-primary btn-next">--}}
                {{--                                            <span class="align-middle d-sm-inline-block d-none">Next</span>--}}
                {{--                                            <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>--}}
                {{--                                        </button>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <div id="address-step-vertical-modern" class="content">--}}
                {{--                                    <div class="content-header">--}}
                {{--                                        <h5 class="mb-0">Address</h5>--}}
                {{--                                        <small>Enter Your Address.</small>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="row">--}}
                {{--                                        <div class="form-group col-md-6">--}}
                {{--                                            <label class="form-label" for="vertical-modern-address">Address</label>--}}
                {{--                                            <input type="text" id="vertical-modern-address" class="form-control" placeholder="98  Borough bridge Road, Birmingham" />--}}
                {{--                                        </div>--}}
                {{--                                        <div class="form-group col-md-6">--}}
                {{--                                            <label class="form-label" for="vertical-modern-landmark">Landmark</label>--}}
                {{--                                            <input type="text" id="vertical-modern-landmark" class="form-control" placeholder="Borough bridge" />--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="row">--}}
                {{--                                        <div class="form-group col-md-6">--}}
                {{--                                            <label class="form-label" for="pincode4">Pincode</label>--}}
                {{--                                            <input type="text" id="pincode4" class="form-control" placeholder="658921" />--}}
                {{--                                        </div>--}}
                {{--                                        <div class="form-group col-md-6">--}}
                {{--                                            <label class="form-label" for="city4">City</label>--}}
                {{--                                            <input type="text" id="city4" class="form-control" placeholder="Birmingham" />--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="d-flex justify-content-between">--}}
                {{--                                        <button class="btn btn-primary btn-prev">--}}
                {{--                                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>--}}
                {{--                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>--}}
                {{--                                        </button>--}}
                {{--                                        <button class="btn btn-primary btn-next">--}}
                {{--                                            <span class="align-middle d-sm-inline-block d-none">Next</span>--}}
                {{--                                            <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>--}}
                {{--                                        </button>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <div id="social-links-vertical-modern" class="content">--}}
                {{--                                    <div class="content-header">--}}
                {{--                                        <h5 class="mb-0">Social Links</h5>--}}
                {{--                                        <small>Enter Your Social Links.</small>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="row">--}}
                {{--                                        <div class="form-group col-md-6">--}}
                {{--                                            <label class="form-label" for="vertical-modern-twitter">Twitter</label>--}}
                {{--                                            <input type="text" id="vertical-modern-twitter" class="form-control" placeholder="https://twitter.com/abc" />--}}
                {{--                                        </div>--}}
                {{--                                        <div class="form-group col-md-6">--}}
                {{--                                            <label class="form-label" for="vertical-modern-facebook">Facebook</label>--}}
                {{--                                            <input type="text" id="vertical-modern-facebook" class="form-control" placeholder="https://facebook.com/abc" />--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="row">--}}
                {{--                                        <div class="form-group col-md-6">--}}
                {{--                                            <label class="form-label" for="vertical-modern-google">Google+</label>--}}
                {{--                                            <input type="text" id="vertical-modern-google" class="form-control" placeholder="https://plus.google.com/abc" />--}}
                {{--                                        </div>--}}
                {{--                                        <div class="form-group col-md-6">--}}
                {{--                                            <label class="form-label" for="vertical-modern-linkedin">Linkedin</label>--}}
                {{--                                            <input type="text" id="vertical-modern-linkedin" class="form-control" placeholder="https://linkedin.com/abc" />--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="d-flex justify-content-between">--}}
                {{--                                        <button class="btn btn-primary btn-prev">--}}
                {{--                                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>--}}
                {{--                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>--}}
                {{--                                        </button>--}}
                {{--                                        <button class="btn btn-success btn-submit">Submit</button>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </section>--}}
                <!-- /Modern Vertical Wizard -->

                    <section id="basic-horizontal-layouts">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Product attributes</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form form-horizontal">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-sm-3 col-form-label">
                                                            <label for="sku">Product SKU</label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="text" id="sku" class="form-control"
                                                                   value="{{ old('sku') }}" name="sku"
                                                                   placeholder="SKU"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-sm-3 col-form-label">
                                                            <label for="price">Regular price (eg. 99.99)</label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="number" id="price" class="form-control"
                                                                   name="price" value="{{ old('price') }}"
                                                                   placeholder="99.99"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-sm-3 col-form-label">
                                                            <label for="upfront-price">Upfront price (eg. 99.99)</label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="number" id="upfront-price" class="form-control"
                                                                   name="upfront_price"
                                                                   value="{{ old('upfront_price') }}"
                                                                   placeholder="99.99"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-sm-3 col-form-label">
                                                            <label for="install-cost">New install cost (eg.
                                                                9.99)</label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="number" id="install-cost" class="form-control"
                                                                   name="install_price"
                                                                   value="{{ old('install_price') }}"
                                                                   placeholder="9.99"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-sm-3 col-form-label">
                                                            <label for="price_type">Price type</label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <select id="price_type" class="form-control"
                                                                    name="price_type">
                                                                <option value="">{{ __('Select type') }}</option>
                                                                <option value="onetime"
                                                                        @if(old('price_type') === 'onetime') selected @endif>{{ __('One time') }}</option>
                                                                <option value="monthly"
                                                                        @if(old('price_type') === 'monthly') selected @endif>{{ __('Monthly') }}</option>
                                                                <option value="yearly"
                                                                        @if(old('price_type') === 'yearly') selected @endif>{{ __('Annually') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-3 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="status">Publish status</label>
                                <select id="status" class="form-control" name="status">
                                    <option value="{{ \App\Constants\AppConst::PRODUCT_PUBLISH }}"
                                            @if(old('status') === \App\Constants\AppConst::PRODUCT_PUBLISH) selected @endif>
                                        Publish
                                    </option>
                                    <option value="{{ \App\Constants\AppConst::PRODUCT_DRAFT }}"
                                            @if(old('status') === \App\Constants\AppConst::PRODUCT_DRAFT) selected @endif>
                                        Draft
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select id="category_id" class="form-control" name="category_id">
                                    <option value="">{{ __('Select category') }}</option>
                                    @foreach($category_lists as $key => $value)
                                        <option value="{{ $key }}"
                                                @if(old('category_id') == $key) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-primary form-control mr-1">{{ __('Create product') }}</button>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category_id">Product photo</label>
                                <input type="file" name="photo" class="form-control-file" placeholder="Choose photo">
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
