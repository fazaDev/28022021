<!-- Vendor js -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>

@yield('scripts')

<!-- Toastr js -->
<script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/toastr.init.js') }}"></script>

@stack('toastr')

<!-- Sweet Alerts js -->
{{-- <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script> --}}

<!-- Sweet alert init js-->
{{-- <script src="assets/js/pages/sweet-alerts.init.js"></script> --}}

<!-- App js -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>
