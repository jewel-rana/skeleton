<div class="card">
    <div class="card-header">
        <h4 class="card-title">Header Setting</h4>
    </div>
    <div class="card-body">
        <form class="form form-horizontal" action="{{ route('setting.store') }}" method="POST">
            @csrf
            <input type="hidden" name="tab" value="header">
            <div class="row">
                <div class="col-8">
                    <div class="form-group row uploadPrent">
                        <div class="col-sm-3 col-form-label">
                            <label for="logo">Logo</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <input type="text" id="logo" class="form-control" value="{{ old('logo', getOption('logo')) }}" name="logo" placeholder="Logo" />
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-primary jQFileUpload" role="logo">
                                        <span class="fa fa-upload"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="logo">Top Menu</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="user"></i></span>
                                </div>
                                <select name="top_menu" class="form-control" required>
                                    <option value="">Select menu</option>
                                    @foreach($menu_lists as $key => $value)
                                        <option value="{{ $key }}" @if(old('top_menu', getOption('top_menu')) === $key) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="main_slider">Main Slider (Header)</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="user"></i></span>
                                </div>
                                <select name="main_slider" class="form-control" id="main_slider" required>
                                    <option value="">Select slider</option>
                                    @foreach($slider_lists as $key => $value)
                                        <option value="{{ $key }}" @if(old('main_slider', getOption('main_slider')) == $key) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
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
                </div>
            </div>
        </form>
    </div>
</div>
