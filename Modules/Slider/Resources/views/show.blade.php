@extends('dashboard::layouts.master')

@section('content')
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="sliderTable">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Btn Text</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($slider->medias as $slide)
                        <tr>
                            <td>
                                <div class="avatar-group">
                                    <img src="{{ asset($slide->attachment) }}" class="table-icon" width="60px" height="auto" />
                                </div>
                            </td>
                            <td>{{ $slide->pivot->title }}</td>
                            <td>{{ $slide->pivot->description }}</td>
                            <td>{{ $slide->pivot->btn_text }}</td>
                            <td>
                                <form class="form-inline form-horizontal" method="POST" action="{{ route('slide.destroy', $slide->id) }}">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="slider_id" value="{{ $slider->id }}">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h4>Add new slide</h4>
                </div>
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
                    <form action="{{ route('slider.add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="slider_id" value="{{ $slider->id }}">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Slide title" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea rows="4" name="description" value="{{ old('description') }}" class="form-control" placeholder="Slide title" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Button text</label>
                            <input type="text" name="btn_text" value="{{ old('btn_text') }}" class="form-control" placeholder="Button text">
                        </div>

                        <div class="form-group">
                            <label>Button url</label>
                            <input type="text" name="btn_link" value="{{ old('btn_link') }}" class="form-control" placeholder="Button url">
                        </div>

                        <div class="form-group">
                            <label>Upload photo</label>
                            <input type="file" name="attachment" class="form-control-file form-control" required />
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">{{ __('Add') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tables end -->
@endsection

@section('header')

@endsection

@section('footer')
@endsection
