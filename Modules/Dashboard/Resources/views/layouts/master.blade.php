@include('dashboard::layouts.header')

@include('dashboard::layouts.sidebar')

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ $title ?? "Title here" }}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrumb-right">

                    @if(request()->segment(2) !== null)
                        @if( request()->segment(3) === null)
                            <a href="{{ url('dashboard/' . request()->segment(2) . '/create') }}" class="btn btn-primary"><i class="mr-1" data-feather="plus"></i><span class="align-middle">Add new {{ request()->segment(2) }}</span></a>
                        @else
                            <a href="javascript:void(window.history.back())" class="btn btn-default"><i class="mr-1" data-feather="arrow-left"></i><span class="align-middle">Back</span></a>
                        @endif
                    @endif
                    <div class="dropdown">
{{--                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>--}}
{{--                        <div class="dropdown-menu dropdown-menu-right">--}}
{{--                            <a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a>--}}
{{--                            <a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a>--}}
{{--                            <a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a>--}}
{{--                            <a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
<!-- END: Content-->
@include('dashboard::layouts.footer')
