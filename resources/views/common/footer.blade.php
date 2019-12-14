      </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>

        @yield('footer_scripts')
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
   
    <!-- Bootstrap tether Core JavaScript -->
      {!! Html::script('admin_css/assets/libs/popper.js/dist/umd/popper.min.js') !!}
      {!! Html::script('admin_css/assets/libs/bootstrap/dist/js/bootstrap.min.js') !!}
      {!! Html::script('admin_css/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') !!}
      {!! Html::script('admin_css/assets/extra-libs/sparkline/sparkline.js') !!}
   
     



   
 
    <!--Wave Effects -->
      {!! Html::script('admin_css/dist/js/waves.js') !!}
  
    <!--Menu sidebar -->
      {!! Html::script('admin_css/dist/js/sidebarmenu.js') !!}
    <!--Custom JavaScript -->
      {!! Html::script('admin_css/dist/js/custom.min.js') !!}

    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
 {!! Html::script('admin_css/assets/libs/flot/excanvas.js') !!}
 {!! Html::script('admin_css/assets/libs/flot/jquery.flot.js') !!}
 {!! Html::script('admin_css/assets/libs/flot/jquery.flot.pie.js') !!}
 {!! Html::script('admin_css/assets/libs/flot/jquery.flot.time.js') !!}
 {!! Html::script('admin_css/assets/libs/flot/jquery.flot.stack.js') !!}
 {!! Html::script('admin_css/assets/libs/flot/jquery.flot.crosshair.js') !!}
 {!! Html::script('admin_css/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') !!}
 {!! Html::script('admin_css/dist/js/pages/chart/chart-page-init.js') !!}



 

</body>

</html>