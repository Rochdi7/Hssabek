 <!-- jQuery -->
 <script src="{{ URL::asset('build/js/jquery-3.7.1.min.js') }}"></script>

 <!-- Feather JS -->
 <script src="{{ URL::asset('build/js/feather.min.js') }}"></script>

 <!-- Daterangepicker JS -->
 <script src="{{ URL::asset('build/js/moment.min.js') }}"></script>
 <script src="{{ URL::asset('build/plugins/daterangepicker/daterangepicker.js') }}"></script>

 <!-- Simplebar JS -->
 <script src="{{ URL::asset('build/plugins/simplebar/simplebar.min.js') }}"></script>

 <!-- Datatable JS -->
 <script src="{{ URL::asset('build/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ URL::asset('build/js/dataTables.bootstrap5.min.js') }}"></script>

 <!-- Select2 JS -->
 <script src="{{ URL::asset('build/plugins/select2/js/select2.min.js') }}"></script>

 <!-- Bootstrap Datetimepicker JS -->
 <script src="{{ URL::asset('build/js/bootstrap-datetimepicker.min.js') }}"></script>

 <!-- Bootstrap Core JS -->
 <script src="{{ URL::asset('build/js/bootstrap.bundle.min.js') }}"></script>

 {{-- Page-specific scripts pushed from individual views --}}
 @stack('scripts')

 <!-- Custom JS -->
 <script src="{{ URL::asset('build/js/script.js') }}"></script>
