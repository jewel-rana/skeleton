@extends('dashboard::layouts.master')

@section('content')
    <!-- Basic tabs start -->
    <section id="basic-tabs-components">
        <div class="row match-height">

            <!-- Tabs with Icon starts -->
            <div class="col-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general"
                           aria-controls="general" role="tab" aria-selected="true"> General
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="header-tab" data-toggle="tab" href="#header"
                           aria-controls="header" role="tab" aria-selected="false"> Header
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="footer-tab" data-toggle="tab" href="#footer"
                           aria-controls="footer" role="tab" aria-selected="false"> Footer
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home"
                           aria-controls="home" role="tab" aria-selected="false">Homepage
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo"
                           aria-controls="seo" role="tab" aria-selected="false">
                            SEO
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="general" aria-labelledby="general-tab" role="tabpanel">
                        @include('setting::general')
                    </div>
                    <div class="tab-pane" id="header" aria-labelledby="header-tab" role="tabpanel">
                        @include('setting::header')
                    </div>
                    <div class="tab-pane" id="footer" aria-labelledby="footer-tab" role="tabpanel">
                        @include('setting::footer')
                    </div>
                    <div class="tab-pane" id="home" aria-labelledby="home-tab" role="tabpanel">
                        @include('setting::home')
                    </div>
                    <div class="tab-pane" id="seo" aria-labelledby="seo-tab" role="tabpanel">
                        @include('setting::seo')
                    </div>
                </div>
            </div>
        </div>
        <!-- Tabs with Icon ends -->
    </section>
    <!-- Basic Tabs end -->
@endsection
