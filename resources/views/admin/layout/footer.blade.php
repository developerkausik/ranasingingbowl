 <footer class="footer">
     <div class="d-sm-flex justify-content-center justify-content-sm-between">
         <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">copyright <?php echo date('Y'); ?>. All rights reserved.
             {{ date('Y') }}</span>
     </div>
 </footer>
 <!-- partial -->
 </div>
 <!-- main-panel ends -->
 </div>
 <!-- page-body-wrapper ends -->
 </div>

 {{--
 <script>
     $(document).ready(function() {
         $('.selectsearch').select2();
     })
 </script> --}}




 <script src="{{ URL::asset('adminassets/assets/vendors/js/vendor.bundle.base.js') }}"></script>
 <!-- endinject -->
 <!-- Plugin js for this page -->
 <script src="{{ URL::asset('adminassets/assets/vendors/chart.js/Chart.min.js') }}"></script>
 <script src="{{ URL::asset('adminassets/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
 <script src="{{ URL::asset('adminassets/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>

 <!-- End plugin js for this page -->
 <!-- inject:js -->
 <script src="{{ URL::asset('adminassets/assets/js/off-canvas.js') }}"></script>
 <script src="{{ URL::asset('adminassets/assets/js/hoverable-collapse.js') }}"></script>
 <script src="{{ URL::asset('adminassets/assets/js/template.js') }}"></script>
 <script src="{{ URL::asset('adminassets/assets/js/settings.js') }}"></script>
 <script src="{{ URL::asset('adminassets/assets/js/todolist.js') }}"></script>
 <!-- endinject -->
 <!-- Custom js for this page-->
 <script src="{{ URL::asset('adminassets/assets/js/dashboard.js') }}"></script>
 <script src="{{ URL::asset('adminassets/assets/js/Chart.roundedBarCharts.js') }}"></script>
 <script src="https://cdn.tiny.cloud/1/riphsr2yy3x79vz03gwbh9f0snaeo7cof5p66w1yvxp6i8na/tinymce/7/tinymce.min.js"
     referrerpolicy="origin"></script>
 <script src="//cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script>
     $(document).ready(function() {
         $('#dataTable').DataTable({
             autoWidth: false,
         });
         $('.selectsearch').select2();
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
     })
 </script>
 <style>
     table#dataTable tbody td {
         white-space: pre-wrap !important;
         word-break: break-word !important;
         vertical-align: top !important;
     }

     .table td img {
         width: 100px !important;
         height: 100px !important;
         border-radius: 100%;
     }

     .select2-container--default .select2-selection--single .select2-selection__rendered {
         line-height: 15px !important;
     }

     .select2-container .select2-selection--single {
         height: 45px !important;
         background-color: #ffffff !important;
     }

     .select2-container--default .select2-selection--single .select2-selection__arrow b {
         margin-top: 5px !important;
     }

     .date-control {
         height: 3rem !important;
     }
     .modal-dialog {
         max-width: 80% !important;
     }
 </style>
 </body>

 </html>
