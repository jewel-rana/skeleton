<div class="card">
    <div class="card-header">
        <h4 class="card-title">Footer Setting</h4>
    </div>
    <div class="card-body">
        <form class="form form-horizontal" action="{{ route('setting.store') }}" method="POST">
            @csrf
            <input type="hidden" name="tab" value="footer">
            <div class="row">
                <div class="col-8">

                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="copyright">Copyright message</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">&copy;</span>
                                </div>
                                <input type="text" id="copyright" class="form-control" value="{{ old('copyright', getOption('copyright')) }}" name="copyright" placeholder="Copyright" />
                            </div>
                        </div>
                    </div>

                    <h4>Footer menus</h4><hr/>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="footer1_menu">Footer 1 menu (Box 2)</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <select id="footer1_menu" class="form-control" name="footer1_menu" required>
                                    <option value="">Select menu</option>
                                    @foreach($menu_lists as $key => $value)
                                        <option value="{{ $key }}" @if(getOption('footer1_meu') === $key) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="footer2_menu">Footer menu 2 (Box 2)</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <select id="footer2_menu" class="form-control" name="footer2_menu" required>
                                    <option value="">Select menu</option>
                                    @foreach($menu_lists as $key => $value)
                                        <option value="{{ $key }}" @if(getOption('footer2_menu') === $key) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="footer3_menu">Footer menu 3 (Box 2)</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <select id="footer3_menu" class="form-control" name="footer3_menu" required>
                                    <option value="">Select menu</option>
                                    @foreach($menu_lists as $key => $value)
                                        <option value="{{ $key }}" @if(getOption('footer3_menu') === $key) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="footer4_menu">Footer menu 4 (Box 4 Second)</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <select id="footer4_menu" class="form-control" name="footer4_menu" required>
                                    <option value="">Select menu</option>
                                    @foreach($menu_lists as $key => $value)
                                        <option value="{{ $key }}" @if(getOption('footer4_menu') === $key) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <h4>Social media</h4><hr/>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="social_facebook">Facebook</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="facebook"></i></span>
                                </div>
                                <input type="text" id="social_facebook" class="form-control" value="{{ old('social_facebook', getOption('social_facebook')) }}" name="social_facebook" placeholder="Facebook" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="social_twitter">Twitter</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="twitter"></i></span>
                                </div>
                                <input type="text" id="social_twitter" class="form-control" value="{{ old('social_twitter', getOption('social_twitter')) }}" name="social_twitter" placeholder="Facebook" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="social_linkedin">Linkedin</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="linkedin"></i></span>
                                </div>
                                <input type="text" id="social_linkedin" class="form-control" value="{{ old('social_linkedin', getOption('social_linkedin')) }}" name="social_linkedin" placeholder="Facebook" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="social_instagram">Instagram</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="instagram"></i></span>
                                </div>
                                <input type="text" id="social_instagram" class="form-control" value="{{ old('social_instagram', getOption('social_instagram')) }}" name="social_instagram" placeholder="Facebook" />
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
