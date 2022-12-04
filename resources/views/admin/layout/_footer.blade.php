<footer class="footer text-center"> <?php echo date("Y"); ?> &copy; {{config('app.project.name')}} - Admin </footer>
	</div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

  <!-- jQuery -->
    
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('/') }}/assets/admin_assets/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ url('/') }}/assets/admin_assets/js/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ url('/') }}/assets/admin_assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="{{ url('/') }}/assets/admin_assets/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ url('/') }}/assets/admin_assets/js/custom.min.js"></script>

    <script src="{{ url('/') }}/assets/admin_assets/js/jquery.waypoints.js"></script>

    <script src="{{ url('/') }}/assets/admin_assets/js/jquery.counterup.min.js"></script>

    <script src="{{ url('/') }}/assets/admin_assets/js/jasny-bootstrap.js"></script>

    <script src="{{ url('/') }}/assets/admin_assets/js/dropify.min.js"></script>

    <script src="{{url('/')}}/assets/admin_assets/js/jquery.geocomplete.js"></script>

    <script src="{{url('/')}}/assets/admin_assets/js/sweetalert_msg.js"></script>

    <script src="{{url('/')}}/assets/admin_assets/js/sweetalert.min.js"></script>
    
    <script src="{{url('/')}}/assets/admin_assets/js/bootstrap-datepicker.min.js"></script>

    
    
<script type="text/javascript">

    function chk_all(field)
    {
        if($(field).prop('checked') == true){
            $('input[type="checkbox"]').prop('checked',true);
        }
        else
        {
            $('input[type="checkbox"]').prop('checked',false);
        }

    }

    // jQuery.validator.addMethod("lettersonlywithspace", function(value, element) {
    //     return this.optional(element) || /^[a-z\s]+$/i.test(value);
    //     }, "Please enter letters only.");
</script>
    <!-- start - This is for export functionality only -->
<!--    <script src="../../../../cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>-->
<!--    <script src="../../../../cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>-->
<!--    <script src="../../../../cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>-->
<!--    <script src="../../../../cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>-->
<!--    <script src="../../../../cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>-->
<!--    <script src="../../../../cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>-->
<!--    <script src="../../../../cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>-->
    <!-- end - This is for export functionality only -->
</body>


<!-- Mirrored from wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-minimal/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Apr 2017 10:36:21 GMT -->
</html>