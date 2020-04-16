@include('admin.layouts.header')
@include('admin.layouts.topbar')
<div class="page-wrapper">
@include('admin.layouts.side-bar')
    @yield('content')
@include('admin.layouts.footer')
</div>
<!-- end page-wrapper -->

<!-- jQuery  -->
<script src="{{url('admin/js/jquery.min.js')}}"></script>
<script src="{{url('admin/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('admin/js/metisMenu.min.js')}}"></script>
<script src="{{url('admin/js/waves.min.js')}}"></script>
<script src="{{url('admin/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{url('admin/plugins/moment/moment.js')}}"></script>
<script src="{{url('admin/plugins/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{url('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('admin/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('admin/pages/jquery.crm_leads.init.js')}}"></script>

<!-- App js -->
<script src="{{url('admin/js/app.js')}}"></script>

</body>
</html>