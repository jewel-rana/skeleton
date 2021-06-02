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

@section('footer')
    <script type="text/javascript" src="{{ asset('js/jquery.upload.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.jQFileUpload').click( function (e) {
                e.defaultPrevented;
                var jQUploadParent = $(this).parents('.uploadPrent');
                var modal = document.getElementById('myModal');
                var modalTitle = modal.querySelector('.modal-title');
                var modalBody = modal.querySelector('.modal-body');
                var role = this.getAttribute('role');
                modalTitle.innerHTML = "Upload " + role;
                modalBody.innerHTML = "";
                //create form
                var form = $("<form method='post' action='{{ route('media.jqupload')}}' enqtype='multipart/form-data' charset='utf-8'></form>");
                var inputGroup = $('<div class="input-group"></div>');
                var inputGroupBtn = $('<span class="input-group-btn"></span>');
                var browsBtn = $('<button id="fake-file-button-browse" type="button" class="btn btn-default"></button>');
                var browsBtnIcon = $('<span class="fa fa-image"> Browse...</span>');
                $(browsBtn).append(browsBtnIcon);
                $(inputGroupBtn).append(browsBtn);
                $(inputGroup).append(inputGroupBtn);
                var fileInput = $('<input type="file" name="uploadfile" id="files-input-upload" style="display:none">');
                $(inputGroup).append(fileInput);
                var textInput = $('<input type="text" id="fake-file-input-name" disabled="disabled" placeholder="File not selected" class="form-control">');
                $(inputGroup).append(textInput);
                var inputGroupSubmit = $('<span class="input-group-btn"></span>');
                var submitBtn = $('<button type="submit" class="btn btn-default" disabled="disabled" id="fake-file-button-upload"></button>');
                var submitBtnIcon = $('<span class="fa fa-upload"></span>');
                $(submitBtn).append(submitBtnIcon);
                $(inputGroupSubmit).append(submitBtn);
                $(inputGroup).append(inputGroupSubmit);
                $(form).append(inputGroup);
                var progressParent = $('<div class="progress"></div>');
                var progressBar = $('<div class="bar"></div >');
                var progressPercent = $('<div class="percent">0%</div >');
                var progressStatus = $('<div id="status"></div>');
                $(progressParent).append(progressBar);
                $(progressParent).append(progressPercent);
                $(form).append(progressParent);
                $(form).append(progressStatus);
                $(modalBody).append(form);
                //click events
                $(browsBtn).click(function(e) {
                    $(fileInput).click();
                });
                $(fileInput).on("change", function(e) {
                    $(textInput).val($(this).val());
                    $(submitBtn).removeAttr('disabled');
                });
                //csrf tockent send to header
                $(form).submit( function(e) {
                    e.defaultPrevented;
                    var bar = $('.bar');
                    var percent = $('.percent');
                    var status = $('#status');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $(this).ajaxSubmit({
                        beforeSend: function() {
                            status.empty();
                            var percentVal = '0%';
                            bar.width(percentVal);
                            percent.html(percentVal);
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                            var percentVal = percentComplete + '%';
                            bar.width(percentVal);
                            percent.html(percentVal);
                        },
                        success: function() {
                            var percentVal = '100%';
                            bar.width(percentVal)
                            percent.html(percentVal);
                        },
                        complete: function(xhr){
                            var msg = xhr.responseText;
                            if( msg == 'no') {
                                status.html("<div class='alert alert-warning'>Cannot upload files.</div>");
                            } else {
                                var fileInputField = jQUploadParent.find('input[name=' + role + ']');
                                fileInputField.val(msg);
                                var imgPreview = jQUploadParent.find('.imgPreview');
                                imgPreview.html('<img src="' + msg + '" class="">');
                                // progressParent.hide();
                                $(modal).modal('hide');
                            }
                        }
                    });
                    return false;
                });
                $(modal).modal("show");
            });
        });
    </script>
@endsection
