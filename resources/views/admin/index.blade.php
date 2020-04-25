
        @include('admin.layouts.header')
        @include('admin.layouts.topbar')

        <div class="page-wrapper">
            @include('admin.layouts.side-bar')

            <!-- Page Content-->
            <div class="page-content">

                <div class="container-fluid">
                    @yield('content')
                </div><!-- container -->

               @include('admin.layouts.footer')
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        <!-- jQuery  -->
        <!-- jQuery  -->
        <script src="{{url('admin/assets/js/jquery.min.js')}}"></script>
        <script src="{{url('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{url('admin/assets/js/metisMenu.min.js')}}"></script>
        <script src="{{url('admin/assets/js/waves.min.js')}}"></script>
        <script src="{{url('admin/assets/js/jquery.slimscroll.min.js')}}"></script>
        <script src="{{url('admin/assets/plugins/moment/moment.js')}}"></script>
        <script src="{{url('admin/assets/plugins/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{url('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
        <script src="{{url('admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <script src="{{url('admin/assets/pages/jquery.eco_dashboard.init.js')}}"></script>
        {{--  <script src="{{url('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('admin/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{url('admin/pages/jquery.crm_leads.init.js')}}"></script>  --}}

        <!-- App js -->
        <script src="{{url('admin/assets/js/app.js')}}"></script>

        @yield('page-js')
    </body>
</html>