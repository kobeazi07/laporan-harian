 {{-- <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
 <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script> --}}

 <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.min.js"></script>



 <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
 <script src="{{ asset('assets/js/app.min.js') }}"></script>
 <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
 <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
 <script src="{{ asset('assets/js/dashboard.js') }}"></script>
 <!-- solar icons -->
 <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
 <script>
     $(document).ready(function() {
         $('#dataTable').DataTable({
             pageLength: 10,
             ordering: true,
             searching: true,
             responsive: true
         });
     });
 </script>
