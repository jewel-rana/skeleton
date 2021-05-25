@extends('dashboard::layouts.master')
@section('content')
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <form class="form form-vertical" action="{{ route('deal.update', $deal->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Name <span class="error">*</span></label>
                                        <input type="text" id="first-name-vertical" class="form-control" name="name"
                                               value="{{ old('name', $deal->name) }}" placeholder="Name" required/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Description</label>
                                        <textarea id="email-id-vertical" class="form-control" name="description"
                                                  placeholder="Description">{{ old('description', $deal->description) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Attributes</h4>
                        </div>
                        <div class="card-body">
                            <div class="invoice-repeater">
                                <div data-repeater-list="attribute">
                                    @if($deal->attributes->count())
                                        @foreach($deal->attributes as $attribute)
                                            <div data-repeater-item>
                                                <div class="row d-flex align-items-end">
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="itemname">Label</label>
                                                            <input type="text" class="form-control" name="label"
                                                                   id="itemname" value="{{ $attribute->label }}" aria-describedby="itemname"
                                                                   placeholder="Label"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="itemvalue">Value</label>
                                                            <input type="text" class="form-control" name="value"
                                                                   id="itemvalue" value="{{ $attribute->value }}" aria-describedby="itemvalue"
                                                                   placeholder="Value"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 col-12 mb-50">
                                                        <div class="form-group">
                                                            <button class="btn btn-outline-danger text-nowrap px-1"
                                                                    data-repeater-delete type="button">
                                                                <i data-feather="x" class="mr-25"></i>
                                                                <span>Delete</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr/>
                                            </div>
                                        @endforeach
                                    @else
                                        <div data-repeater-item>
                                            <div class="row d-flex align-items-end">
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="itemname">Label</label>
                                                        <input type="text" class="form-control" name="label"
                                                               id="itemname" aria-describedby="itemname"
                                                               placeholder="Label"/>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="itemvalue">Value</label>
                                                        <input type="text" class="form-control" name="value"
                                                               id="itemvalue" aria-describedby="itemvalue"
                                                               placeholder="Value"/>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-12 mb-50">
                                                    <div class="form-group">
                                                        <button class="btn btn-outline-danger text-nowrap px-1"
                                                                data-repeater-delete type="button">
                                                            <i data-feather="x" class="mr-25"></i>
                                                            <span>Delete</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                            <i data-feather="plus" class="mr-25"></i>
                                            <span>{{ __('Add New') }}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="product_id">Select product</label>
                                <select class="form-control form-control-lg" id="product_id" name="product_id">
                                    <option selected value="{{ $deal->product_id }}">{{ $deal->product->title }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="deal_type_id">Select type</label>
                                <select class="form-control" id="deal_type_id" name="deal_type_id" required>
                                    <option value="">Select deal type</option>
                                    @foreach($deal_type_lists as $key => $value)
                                        <option value="{{ $key }}"
                                                @if(old('deal_type_id', $deal->deal_type_id) == $key) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary mr-1">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('header')
@endsection
@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/admin/js/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scripts/forms/form-repeater.js') }}"></script>
    <script>
        jQuery(function ($) {
            $('#product_id').select2({
                placeholder: "Select product",
                allowClear: true,
                cache: false,
                ajax: {
                    url: "{{ route('product.suggest') }}",
                    dataType: 'json',
                    type: "GET",
                    quietMillis: 50,
                    data: function (term) {
                        return {
                            term: term.term
                        };
                    },
                    processResults: function (data) {
                        var myResults = [];
                        $.each(data.results, function (index, item) {
                            myResults.push({
                                'id': item.id,
                                'text': item.name
                            });
                        });
                        return {
                            results: myResults
                        };
                    }
                }
            });
        });
    </script>
@endsection
