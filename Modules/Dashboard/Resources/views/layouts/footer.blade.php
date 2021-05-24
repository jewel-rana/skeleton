
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0">
        <span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; {{ date('Y') }}
            <a class="ml-25" href="{{ url('/') }}" target="_blank">{{ config('app.name') }}</a>
            <span class="d-none d-sm-inline-block"> All rights Reserved</span></span>
    </p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{ asset('assets/admin/js/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->
<script src="{{ asset('assets/admin/js/vendors/js/extensions/toastr.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('assets/admin/js/core/app-menu.js') }}"></script>
<script src="{{ asset('assets/admin/js/core/app.js') }}"></script>
<!-- END: Theme JS-->


<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
@yield('footer')
</body>
<!-- END: Body-->
</html>
