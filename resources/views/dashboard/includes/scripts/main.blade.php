


<script src="{{asset('assets/dashboard/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('assets/dashboard/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('assets/dashboard/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets/dashboard/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('assets/dashboard/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/dashboard/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/dashboard/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('assets/dashboard/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dashboard/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dashboard/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/dashboard/js/pages/dashboard.js')}}"></script>
<script src="{{asset('assets/dashboard/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/codemirror/codemirror.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/codemirror/mode/css/css.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/codemirror/mode/xml/xml.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
<!-- AdminLTE for demo purposes -->

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>


   @yield('scripts')
   @stack('script')
   {{-- <script src="{{ asset('assets/dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/plugins/jszip/jszip.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/plugins/pdfmake/pdfmake.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/plugins/pdfmake/vfs_fonts.js') }}"></script>
   <script src="{{ asset('assets/dashboard/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/plugins/toastr/toastr.min.js') }}"></script> --}}

