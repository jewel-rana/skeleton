@extends('dashboard::layouts.master')

@section('content')
    <!-- Basic tabs start -->
    <section id="basic-tabs-components">
        <div class="row match-height">

            <!-- Tabs with Icon starts -->
            <div class="col-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="homeIcon-tab" data-toggle="tab" href="#homeIcon"
                           aria-controls="home" role="tab" aria-selected="true"><i data-feather="home"></i> General
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profileIcon-tab" data-toggle="tab" href="#profileIcon"
                           aria-controls="profile" role="tab" aria-selected="false"><i data-feather="tool"></i>
                            Service
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="disabledIcon" id="disabledIcon-tab" class="nav-link disabled"><i
                                data-feather="eye-off"></i> Disabled
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="aboutIcon-tab" data-toggle="tab" href="#aboutIcon"
                           aria-controls="about" role="tab" aria-selected="false"><i data-feather="user"></i>
                            Account
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="homeIcon" aria-labelledby="homeIcon-tab" role="tabpanel">
                        ..
                    </div>
                    <div class="tab-pane" id="profileIcon" aria-labelledby="profileIcon-tab" role="tabpanel">
                        ..
                    </div>
                    <div class="tab-pane" id="disabledIcon" aria-labelledby="disabledIcon-tab" role="tabpanel">
                        ..
                    </div>
                    <div class="tab-pane" id="aboutIcon" aria-labelledby="aboutIcon-tab" role="tabpanel">
                        ..
                    </div>
                </div>
            </div>
        </div>
        <!-- Tabs with Icon ends -->
    </section>
    <!-- Basic Tabs end -->
@endsection
