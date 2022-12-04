<!-- HEader -->        
@include('admin.layout._header')    
        
<!-- BEGIN Sidebar -->

@include('admin.layout._sidebar')

<!-- END Sidebar -->

<!-- BEGIN Content -->

<div id="page-wrapper" style="min-height: 735px !important;">
<!-- Start of container-fluid -->
    <!-- <div class="container-fluid"> -->
          @yield('main_content')
 	<!-- </div> -->
<!-- End of container-fluid -->
@include('admin.layout._footer')
       