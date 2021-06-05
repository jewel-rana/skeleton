@extends('dashboard::layouts.master')

@section('content')
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <p class="card-text"></p>
                </div>
                <div>
                    <table class="table" id="sliderTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Items</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tables end -->
@endsection

@section('header')

@endsection

@section('footer')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/admin/js/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <script>
        jQuery(function ($) {
            let table = $('#sliderTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('slider.index') }}'
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'items', name: 'items', searchable: false, orderable: false},
                    {data: 'description', name: 'description'},
                    {data: 'action', name: 'action', searchable: false, orderable: false}
                ]
            });
        });
    </script>
@endsection
