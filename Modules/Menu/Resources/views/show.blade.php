@extends('dashboard::layouts.master')

@section('content')    <!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="card">
                <form action="{{ route('menuItem.store') }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h4><i data-feather="plus"></i> Custom menu</h4>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="name">
                        </div>
                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" name="menu_url" class="form-control" id="url" placeholder="url">
                        </div>
                        <div class="form-group">
                            <label for="menu_class">Menu Class</label>
                            <input type="text" name="css_class" class="form-control" id="menu_class"
                                   placeholder="Class name">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Add to menu</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $title }}</h4>
                </div>
                <div class="card-body">
                    <div id="demo">
                        @include('menu::sortable')
                    </div><!-- END #demo -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('header')
    <style type="text/css">

        ol {
            padding-left: 25px;
        }

        ol.sortable, ol.sortable ol {
            list-style-type: none;
        }

        .sortable li div {
            border: 1px solid #d4d4d4;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            cursor: move;
            border-color: #D4D4D4 #D4D4D4 #BCBCBC;
            margin: 5px;
            padding: 10px;
        }

        li.mjs-nestedSortable-collapsed.mjs-nestedSortable-hovering div {
            border-color: #999;
        }

        .disclose, .expandEditor {
            cursor: pointer;
            width: 20px;
            display: none;
        }

        .sortable li.mjs-nestedSortable-collapsed > ol {
            display: none;
        }

        .sortable li.mjs-nestedSortable-branch > div > .disclose {
            display: inline-block;
        }

        .sortable span.ui-icon {
            display: inline-block;
            margin: 0 5px;
            padding: 0 5px;
        }

        .menuDiv {
            background: #EBEBEB;
        }

        .menuEdit {
            background: #FFF;
        }

        .itemTitle {
            vertical-align: middle;
            cursor: pointer;
        }

        .deleteMenu {
            float: right;
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css"/>
@endsection

@section('footer')
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
    <script type="text/javascript"
            src="/assets/plugins/nestedSortable/jquery.mjs.nestedSortable.js"></script>

    <script>
        jQuery(function ($) {
            var ns = $('ol.sortable').nestedSortable({
                forcePlaceholderSize: true,
                handle: 'div',
                helper: 'clone',
                items: 'li',
                opacity: .6,
                placeholder: 'placeholder',
                revert: 250,
                tabSize: 25,
                tolerance: 'pointer',
                toleranceElement: '> div',
                maxLevels: 2,
                isTree: true,
                expandOnHover: 700,
                startCollapsed: false,
                change: function (e) {
                }
            });

            $('.disclose').on('click', function () {
                $(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
                $(this).toggleClass('ui-icon-plusthick').toggleClass('ui-icon-minusthick');
            });

            $('.expandEditor, .itemTitle').click(function () {
                var id = $(this).attr('data-id');
                $('#menuEdit' + id).toggle();
                $(this).toggleClass('ui-icon-triangle-1-n').toggleClass('ui-icon-triangle-1-s');
            });

            $('.deleteMenu').click(function () {
                var id = $(this).attr('data-id');
                $('#menuItem_' + id).remove();
            });

            $('#toArray').click(function (e) {
                let sorted = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#toArrayOutput').text("Saving...");
                $.ajax({
                    type: "POST",
                    data: {sorted: sorted},
                    url: "{{ route('menuItem.save') }}",
                    success: function(data) {
                        $('#toArrayOutput').text(data.message);
                    }
                });
            });
        });
    </script>
@endsection
