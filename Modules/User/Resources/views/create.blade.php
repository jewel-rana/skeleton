@extends('dashboard::layouts.master')
@section('content')
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Name <span class="error">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" id="mobile" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="Mobile"/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="mobile">Role</label>
                                        <select name="role" class="form-control">
                                            <option value="">{{ __('Select role') }}</option>
                                            @foreach($role_lists as $key => $value)
                                                <option value="{{ $key }}" @if(old('role')) selected @endif>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="password" required/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password">Password confirm</label>
                                        <input type="password" id="password-confirm" class="form-control" name="password_confirm" placeholder="password" required/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
