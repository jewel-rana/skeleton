<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#xlarge">
    Vertically Centered
</button>
<!-- Modal -->
<div class="modal fade text-left" id="xlarge" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" data-backdrop="false" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general"
                           aria-controls="general" role="tab" aria-selected="true"> Media
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="upload-tab" data-toggle="tab" href="#upload"
                           aria-controls="upload" role="tab" aria-selected="false"> Upload
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="general" aria-labelledby="general-tab" role="tabpanel">
                        <div class="row d-flex">
                            <div class="col-12" style="min-height: 600px;">
                                <table class="table" id="mediaUploaderTable">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkedAll"></th>
                                        <th>Thumb</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Size</th>
                                        <th>Dimension</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div class="col-md-4 col-5" style="background:blue"></div>
                        </div>
                    </div>
                    <div class="tab-pane" id="upload" aria-labelledby="upload-tab" role="tabpanel">
                        <form action="{{ route('media.store') }}" method="POST" class="dropzone dropzone-area" id="dpz-remove-thumb">
                            @csrf
                            <div class="dz-message">Drop files here or click to upload.</div>
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Insert</button>
            </div>
        </div>
    </div>
</div>
@section('headerChild')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/plugins/forms/form-file-uploader.css') }}">
@endsection
@section('footerChild')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/admin/js/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scripts/forms/form-file-uploader.js') }}"></script>
    <script>
        jQuery(function ($) {
            let table = $('#mediaUploaderTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('media.index') }}'
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'thumbnail', name: 'thumbnail'},
                    {data: 'attachment', name: 'attachment'},
                    {data: 'type', name: 'type'},
                    {data: 'size', name: 'size'},
                    {data: 'dimension', name: 'dimension'}
                ]
            });

            $('#search-form').on('submit', function(e) {
                table.draw();
                e.preventDefault();
            });
        });
    </script>
@endsection
