<div class="card">
    <div class="card-header">
        <h4 class="card-title">General Setting</h4>
    </div>
    <div class="card-body">
        <form class="form form-horizontal" action="{{ route('setting.store') }}" method="POST">
            @csrf
            <input type="hidden" name="tab" value="general">
            <div class="row">
                <div class="col-8">
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="company_name">Company name</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="user"></i></span>
                                </div>
                                <input type="text" id="company_name" class="form-control" value="{{ old('company_name', getOption('company_name')) }}" name="company_name" placeholder="Company name" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="company_email">Company Email</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="mail"></i></span>
                                </div>
                                <input type="email" id="company_email" class="form-control" value="{{ old('company_email', getOption('company_email')) }}" name="company_email" placeholder="Email address" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-form-label">
                            <label for="contact-icon">Company Mobile</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather="smartphone"></i></span>
                                </div>
                                <input type="text" id="contact-icon" class="form-control" name="company_mobile" value="{{ old('company_mobile', getOption('company_mobile')) }}" placeholder="Mobile" />
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
