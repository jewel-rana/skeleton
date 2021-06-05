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
                    <table class="table" id="productTable" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        <tr>--}}
{{--                            <td>--}}
{{--                                <img src="{{ asset('assets/images/icons/angular.svg') }}" class="mr-75" height="20" width="20" alt="Angular" />--}}
{{--                                <span class="font-weight-bold">Angular Project</span>--}}
{{--                            </td>--}}
{{--                            <td>Peter Charls</td>--}}
{{--                            <td>--}}
{{--                                <div class="avatar-group">--}}
{{--                                    <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="Lilian Nenez">--}}
{{--                                        <img src="{{ asset('assets/images/portrait/small/avatar-s-5.jpg') }}" alt="Avatar" height="26" width="26" />--}}
{{--                                    </div>--}}
{{--                                    <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="Alberto Glotzbach">--}}
{{--                                        <img src="{{ asset('assets/images/portrait/small/avatar-s-6.jpg') }}" alt="Avatar" height="26" width="26" />--}}
{{--                                    </div>--}}
{{--                                    <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="Alberto Glotzbach">--}}
{{--                                        <img src="{{ asset('assets/images/portrait/small/avatar-s-7.jpg') }}" alt="Avatar" height="26" width="26" />--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td><span class="badge badge-pill badge-light-primary mr-1">Active</span></td>--}}
{{--                            <td>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">--}}
{{--                                        <i data-feather="more-vertical"></i>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu">--}}
{{--                                        <a class="dropdown-item" href="javascript:void(0);">--}}
{{--                                            <i data-feather="edit-2" class="mr-50"></i>--}}
{{--                                            <span>Edit</span>--}}
{{--                                        </a>--}}
{{--                                        <a class="dropdown-item" href="javascript:void(0);">--}}
{{--                                            <i data-feather="trash" class="mr-50"></i>--}}
{{--                                            <span>Delete</span>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
                        </tbody>
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
    <script src="{{ asset('assets/admin/js/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <script>
        jQuery(function ($) {
            let table = $('#productTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('product.index') }}',
                    data: function (d) {
                        d.name = $('input[name=name]').val();
                        d.email = $('input[name=email]').val();
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'category.name', name: 'category'},
                    {data: 'price', name: 'price'},
                    {data: 'action', searchable: false, orderable: false}
                ]
            });

            $('#search-form').on('submit', function(e) {
                table.draw();
                e.preventDefault();
            });
        });
    </script>
@endsection
