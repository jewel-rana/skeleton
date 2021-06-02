<form class="form form-horizontal" action="{{ route('setting.store') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Section 1</h4>
        </div>
        <div class="card-body">
            <input type="hidden" name="tab" value="home">
            <div class="row">
                <div class="col-8">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="main_slider">Title</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" name="section1_title"
                                       value="{{ old('section1_title', getOption('section1_title')) }}"
                                       class="form-control" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="main_slider">Description</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <textarea type="text" name="section1_description" class="form-control"
                                          placeholder="Description">{{ old('section1_description', getOption('section1_description')) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="main_slider">Button Url</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" name="section1_url" class="form-control" placeholder="Url"
                                       value="{{ old('section1_url', getOption('section1_url')) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Section 2</h4>
        </div>
        <div class="card-body">
            <input type="hidden" name="tab" value="home">
            <div class="row">
                <div class="col-8">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="main_slider">Title</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" name="section2_title"
                                       value="{{ old('section2_title', getOption('section2_title')) }}"
                                       class="form-control" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="section2_label">Label</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" name="section2_label" class="form-control"
                                          placeholder="Label" value="{{ old('section2_label', getOption('section2_label')) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Section 3</h4>
        </div>
        <div class="card-body">
            <input type="hidden" name="tab" value="home">
            <div class="row">
                <div class="col-8">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="section3_title">Title</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" name="section3_title"
                                       value="{{ old('section3_title', getOption('section3_title')) }}"
                                       class="form-control" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="section3_description">Description</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <textarea type="text" name="section3_description" class="form-control"
                                          placeholder="Description">{{ old('section3_description', getOption('section3_description')) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="main_slider">Contract Period</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" name="section2_contract" class="form-control" placeholder="Url"
                                       value="{{ old('section2_contract', getOption('section2_contract')) }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="section3_price">Price</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" name="section3_price" class="form-control" placeholder="Url"
                                       value="{{ old('section3_price', getOption('section3_price')) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Section 4</h4>
        </div>
        <div class="card-body">
            <input type="hidden" name="tab" value="home">
            <div class="row">
                <div class="col-8">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="section4_title">Title</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" name="section4_title"
                                       value="{{ old('section4_title', getOption('section4_title')) }}"
                                       class="form-control" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="section4_description">Description</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <textarea type="text" name="section4_description" class="form-control"
                                          placeholder="Description">{{ old('section4_description', getOption('section4_description')) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="section4_url">Button Url</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" name="section4_url" class="form-control" placeholder="Url"
                                       value="{{ old('section4_url', getOption('section4_url')) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Section 5</h4>
        </div>
        <div class="card-body">
            <input type="hidden" name="tab" value="home">
            <div class="row">
                <div class="col-8">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="section5_title">Pricing table (Deal)</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <select name="section5_deal" class="form-control" required>
                                    <option value="">Select deal</option>
                                    @foreach($deal_type_lists as $key => $value)
                                    <option value="{{ $key }}" @if(old('section5_deal', getOption('section5_deal')) == $key) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Section 6</h4>
        </div>
        <div class="card-body">
            <input type="hidden" name="tab" value="home">
            <div class="row">
                <div class="col-8">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="section6_title">Title</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" name="section6_title"
                                       value="{{ old('section6_title', getOption('section6_title')) }}"
                                       class="form-control" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="section6_title">Description</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <textarea type="text" name="section6_description" class="form-control"
                                          placeholder="Description">{{ old('section6_description', getOption('section6_description')) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="section6_title">Button Url</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" name="section6_url" class="form-control" placeholder="Url"
                                       value="{{ old('section6_url', getOption('section6_url')) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Section 7</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="section7_title">Title</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" name="section7_title"
                                       value="{{ old('section7_title', getOption('section7_title')) }}"
                                       class="form-control" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="section7_title">Description</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <textarea type="text" name="section7_description" class="form-control"
                                          placeholder="Description">{{ old('section7_description', getOption('section7_description')) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Section 8</h4>
        </div>
        <div class="card-body">
            <input type="hidden" name="tab" value="home">
            <div class="row">
                <div class="col-8">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="section8_title">Title</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" name="section8_title"
                                       value="{{ old('section8_title', getOption('section8_title')) }}"
                                       class="form-control" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="section8_big_text">Big Text</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" name="section8_big_text"
                                       value="{{ old('section8_big_text', getOption('section8_big_text')) }}"
                                       class="form-control" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="section8_title">Description</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <textarea type="text" name="section8_description" class="form-control"
                                          placeholder="Description">{{ old('section8_description', getOption('section8_description')) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="section8_title">Button Url</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" name="section8_url" class="form-control" placeholder="Url"
                                       value="{{ old('section8_url', getOption('section8_url')) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-3 col-form-label">
        </div>
        <div class="col-sm-9">
            <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
        </div>
    </div>
</form>
